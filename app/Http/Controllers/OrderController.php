<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display all orders in admin panel
     */
    public function index()
    {
        // latest first
        $orders = Order::latest()->get();

        return view('admin.pannel.orders', compact('orders'));
    }

    /**
     * Show a single order
     */
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('admin.pannel.orders', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,packed,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        // If using Pusher/Broadcast, trigger event here
        // event(new \App\Events\OrderStatusUpdated($order));

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Order status updated',
                'status' => $order->status,
            ]);
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
