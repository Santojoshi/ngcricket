<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    private function userCart() {
        return Cart::session(Auth::id());
    }

    public function index()
    {
        $items = $this->userCart()->getContent();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error','Your cart is empty.');
        }

        $subtotal = $items->sum(fn($i) => $i->price * $i->quantity);
        $shipping = 0;
        $discount = 0;
        $total    = $subtotal + $shipping - $discount;

        return view('front/pages/checkout', compact('items','subtotal','shipping','discount','total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // shipping
            'ship_name'     => 'required|max:150',
            'ship_phone'    => 'required|max:20',
            'ship_address1' => 'required|max:255',
            'ship_city'     => 'required|max:120',
            'ship_state'    => 'nullable|max:120',
            'ship_postcode' => 'nullable|max:20',
            'ship_country'  => 'nullable|max:60',
            // billing
            'billing_same_as_shipping' => 'sometimes|boolean',
            'bill_name'     => 'nullable|max:150',
            'bill_phone'    => 'nullable|max:20',
            'bill_address1' => 'nullable|max:255',
            'bill_city'     => 'nullable|max:120',
            'bill_state'    => 'nullable|max:120',
            'bill_postcode' => 'nullable|max:20',
            'bill_country'  => 'nullable|max:60',
            // payment
            'payment_method'=> 'required|in:cod,online',
        ]);

        $items = $this->userCart()->getContent();
        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error','Your cart is empty.');
        }

        $subtotal = $items->sum(fn($i) => $i->price * $i->quantity);
        $shipping = 0;
        $discount = 0;
        $total    = $subtotal + $shipping - $discount;

        DB::beginTransaction();
        try {
            $same = (bool)$request->boolean('billing_same_as_shipping', true);

            $order = Order::create([
                'user_id'  => Auth::id(),
                // shipping
                'ship_name'     => $request->ship_name,
                'ship_phone'    => $request->ship_phone,
                'ship_address1' => $request->ship_address1,
                'ship_address2' => $request->ship_address2,
                'ship_city'     => $request->ship_city,
                'ship_state'    => $request->ship_state,
                'ship_postcode' => $request->ship_postcode,
                'ship_country'  => $request->ship_country ?? 'IN',

                // billing
                'billing_same_as_shipping' => $same,
                'bill_name'     => $same ? $request->ship_name     : $request->bill_name,
                'bill_phone'    => $same ? $request->ship_phone    : $request->bill_phone,
                'bill_address1' => $same ? $request->ship_address1 : $request->bill_address1,
                'bill_address2' => $same ? $request->ship_address2 : $request->bill_address2,
                'bill_city'     => $same ? $request->ship_city     : $request->bill_city,
                'bill_state'    => $same ? $request->ship_state    : $request->bill_state,
                'bill_postcode' => $same ? $request->ship_postcode : $request->bill_postcode,
                'bill_country'  => $same ? ($request->ship_country ?? 'IN') : $request->bill_country,

                // totals
                'subtotal'     => $subtotal,
                'shipping_fee' => $shipping,
                'discount'     => $discount,
                'total'        => $total,

                // payment
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'status'         => 'pending',
            ]);

            foreach ($items as $it) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $it->id,
                    'product_name' => $it->name,
                    'price'        => $it->price,
                    'quantity'     => $it->quantity,
                    'line_total'   => $it->price * $it->quantity,
                    'image'        => $it->attributes['image'] ?? null,
                ]);
            }

            $this->userCart()->clear();
            DB::commit();

            return redirect()->route('checkout.success')->with('success', 'Order placed! #'.$order->id);
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error','Checkout failed: '.$e->getMessage())->withInput();
        }
    }

    public function success()
    {
        return view('front/pages/checkout-success');
    }
}
