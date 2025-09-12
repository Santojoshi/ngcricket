<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Events\NewOrderPlaced;

class CheckoutController extends Controller
{
    /**
     * Show checkout form
     */
   public function index()
{
    // Use CartController logic to get the correct cart
    $cart = auth()->check() ? Cart::session(auth()->id())->getContent() : Cart::session(session()->getId())->getContent();

    if ($cart->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);
    $shipping = 0; // set default shipping
    $discount = 0; // apply any discount logic here
    $total = $subtotal + $shipping - $discount;

    return view('front/pages/checkout', compact('cart', 'subtotal', 'shipping', 'discount', 'total'));
}

    /**
     * Place order
     */
    public function store(Request $request)
    {
        $sessionKey = Auth::check() ? Auth::id() : session()->getId();

        $cart = Cart::session($sessionKey)->getContent();
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        $request->validate([
            // Shipping fields
            'ship_name'     => 'required|string|max:255',
            'ship_phone'    => 'required|string|max:20',
            'ship_address1' => 'required|string|max:255',
            'ship_city'     => 'required|string|max:100',
            'ship_state'    => 'required|string|max:100',
            'ship_postcode' => 'required|string|max:20',
            'ship_country'  => 'required|string|max:100',

            // Billing fields
            'billing_same_as_shipping' => 'nullable|boolean',
            'bill_name'     => 'nullable|string|max:255',
            'bill_phone'    => 'nullable|string|max:20',
            'bill_address1' => 'nullable|string|max:255',
            'bill_city'     => 'nullable|string|max:100',
            'bill_state'    => 'nullable|string|max:100',
            'bill_postcode' => 'nullable|string|max:20',
            'bill_country'  => 'nullable|string|max:100',

            // Payment
            'payment_method' => 'required|string|in:cod,card,upi',
        ]);

        DB::beginTransaction();
        try {
            // Calculate totals
            $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);
            $shipping_fee = 50; // static for now
            $discount = 0; // apply coupon logic if needed
            $total = $subtotal + $shipping_fee - $discount;

            // If billing same as shipping
            if ($request->billing_same_as_shipping) {
                $request->merge([
                    'bill_name'     => $request->ship_name,
                    'bill_phone'    => $request->ship_phone,
                    'bill_address1' => $request->ship_address1,
                    'bill_address2' => $request->ship_address2,
                    'bill_city'     => $request->ship_city,
                    'bill_state'    => $request->ship_state,
                    'bill_postcode' => $request->ship_postcode,
                    'bill_country'  => $request->ship_country,
                ]);
            }

            // Create order
            $order = Order::create([
                'user_id'   => Auth::id(),
                'ship_name' => $request->ship_name,
                'ship_phone'=> $request->ship_phone,
                'ship_address1' => $request->ship_address1,
                'ship_address2' => $request->ship_address2,
                'ship_city'     => $request->ship_city,
                'ship_state'    => $request->ship_state,
                'ship_postcode' => $request->ship_postcode,
                'ship_country'  => $request->ship_country,

                'billing_same_as_shipping' => $request->billing_same_as_shipping ?? false,
                'bill_name'     => $request->bill_name,
                'bill_phone'    => $request->bill_phone,
                'bill_address1' => $request->bill_address1,
                'bill_address2' => $request->bill_address2,
                'bill_city'     => $request->bill_city,
                'bill_state'    => $request->bill_state,
                'bill_postcode' => $request->bill_postcode,
                'bill_country'  => $request->bill_country,

                'subtotal'  => $subtotal,
                'shipping_fee' => $shipping_fee,
                'discount'  => $discount,
                'total'     => $total,

                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'status'         => 'pending',
            ]);

            // Save items
            foreach ($cart as $item) {



                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'line_total'   => $item->price * $item->quantity,
                ]);
            }

            // Clear cart
            Cart::session($sessionKey)->clear();

            DB::commit();

            // Fire real-time event for admin
            event(new NewOrderPlaced($order));

            return redirect()->route('checkout.success')
                ->with('success', 'Order placed successfully! #'.$order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: '.$e->getMessage());
        }
    }

    /**
     * Success page
     */
    public function success()
    {
        return view('checkout.success');
    }
}
