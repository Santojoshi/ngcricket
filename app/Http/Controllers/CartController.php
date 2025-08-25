<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\ProductModel;


class CartController extends Controller
{
    private function cart()
    {
        return Auth::check()
            ? Cart::session(Auth::id())
            : Cart::session(session()->getId());
    }

    public function index()
    {
        $items = $this->cart()->getContent();
        $total = $this->cart()->getTotal();
        return view('front/pages/cart', compact('items','total'));
    }

    public function add(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);

        $this->cart()->add([
            'id'       => $product->id,
            'name'     => $product->product_name,
            'price'    => $product->us_price_actual,
            'quantity' => (int)($request->input('qty', 1)),
            'attributes' => [
                'image' => $product->img1,
            ],
        ]);

        return back()->with('success','Added to cart');
    }

    public function update(Request $request, $id)
    {
        $qty = (int)$request->input('quantity', 1);
        $this->cart()->update($id, [
            'quantity' => [
                'relative' => false,
                'value'    => max(1, $qty),
            ],
        ]);

        return response()->json([
            'ok'    => true,
            'total' => $this->cart()->getTotal(),
        ]);
    }

    public function remove($id)
    {
        $this->cart()->remove($id);
        return back();
    }

    public function clear()
    {
        $this->cart()->clear();
        return back();
    }
    public function getCartCount()
{
    $cartSession = auth()->check() ? auth()->id() : session()->getId();
    $count = Cart::session($cartSession)->getTotalQuantity();

    return response()->json(['count' => $count]);
}
}
