<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\ProductModel;

class CartController extends Controller
{
    /**
     * Get current cart instance (for user or guest)
     */
    private function cart()
    {
        return Auth::check()
            ? Cart::session(Auth::id())
            : Cart::session(session()->getId());
    }

    /**
     * Show cart page
     */
    public function index()
    {
        $items = $this->cart()->getContent();
        $total = $this->cart()->getTotal();

        return view('front.pages.cart', compact('items', 'total'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);

        $this->cart()->add([
            'id'       => $product->id,
            'name'     => $product->product_name,
            'price'    => $product->us_price_actual,
            'quantity' => (int) $request->input('qty', 1),
            'attributes' => [
                'image' => $product->img1,
            ],
        ]);

        return back()->with('success', 'Product added to cart!');
    }

    /**
     * Update quantity
     */
    public function update(Request $request, $id)
    {
        $qty = (int) $request->input('quantity', 1);

        $this->cart()->update($id, [
            'quantity' => [
                'relative' => false,
                'value'    => max(1, $qty),
            ],
        ]);

        // Return fresh totals (for AJAX frontend update)
        return response()->json([
            'ok'      => true,
            'itemQty' => $this->cart()->get($id)->quantity,
            'itemSub' => $this->cart()->get($id)->getPriceSum(),
            'total'   => $this->cart()->getTotal(),
        ]);
    }

    /**
     * Remove item
     */
    public function remove($id)
    {
        $this->cart()->remove($id);

        return back()->with('success', 'Item removed from cart.');
    }

    /**
     * Clear cart
     */
    public function clear()
    {
        $this->cart()->clear();

        return back()->with('success', 'Cart cleared.');
    }

    /**
     * Get cart item count (for header/cart icon)
     */
    public function getCartCount()
    {
        $count = $this->cart()->getTotalQuantity();

        return response()->json(['count' => $count]);
    }
}
