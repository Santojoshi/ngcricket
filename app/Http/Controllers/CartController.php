<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::getContent();
        return view('front/pages/cart', compact('items'));
    }

    public function add($id)
    {
        $product = ProductModel::findOrFail($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->us_price_actual,
            'quantity' => 1,
            'attributes' => collect([
            'image' => $product->img1,
            ])
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item removed.');
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', 'Cart cleared.');
    }
    public function update(Request $request, $id)
{
    $action = $request->input('action'); // increase or decrease

    if ($action == 'increase') {
        Cart::update($id, [
            'quantity' => +1
        ]);
    } elseif ($action == 'decrease') {
        Cart::update($id, [
            'quantity' => -1
        ]);
    }

    $item = Cart::get($id);

    // If request is AJAX → return JSON
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'quantity' => $item->quantity,
            'itemTotal' => $item->getPriceSum(),
            'cartTotal' => Cart::getTotal(),
        ]);
    }

    // fallback (normal form submit)
    return back()->with('success', 'Cart updated successfully!');
}

}
