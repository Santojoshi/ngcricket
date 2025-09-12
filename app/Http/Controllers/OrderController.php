<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Events\NewOrderPlaced;
use App\Events\OrderStatusUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * ADMIN: Show all orders
     */
    public function index()
    {
        try {
            $activeOrders = Order::with('user')
                ->whereNotIn('status', ['delivered', 'cancelled'])
                ->latest()
                ->get();

            $completedOrders = Order::with('user')
                ->whereIn('status', ['delivered', 'cancelled'])
                ->latest()
                ->take(50) // Limit to recent 50 completed orders
                ->get();

            return view('admin.pannel.orders.index', compact('activeOrders', 'completedOrders'));
        } catch (\Exception $e) {
            Log::error('Error fetching orders: ' . $e->getMessage());
            return back()->with('error', 'Unable to fetch orders');
        }
    }

   /**
 * ADMIN: Show single order with items + user
 */
public function show($id)
{
    try {
        $order = Order::with(['items.product', 'user'])->findOrFail($id);
        
        // For AJAX requests, return the partial view
        if (request()->ajax() || request()->wantsJson()) {
            return view('admin.pannel.orders.partials.details', compact('order'))->render();
        }
        
        // For regular requests, return the full view
        return view('admin.pannel.orders.show', compact('order'));
    } catch (\Exception $e) {
        Log::error('Error fetching order details: ' . $e->getMessage());
        
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'error' => 'Order not found: ' . $e->getMessage()
            ], 404);
        }
        
        return back()->with('error', 'Order not found');
    }
}

 /**
 * ADMIN: Update order status (AJAX)
 */
public function updateStatus(Request $request, $id)
{
    \Log::info('Update status request received', [
        'order_id' => $id,
        'request_data' => $request->all(),
        'ip' => $request->ip()
    ]);

    try {
        $request->validate([
            'status' => 'required|in:pending,accepted,packed,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $oldStatus = $order->status;
        $order->status = $request->status;
        
        // Update payment status if order is delivered
        if ($request->status === 'delivered' && $order->payment_method === 'cod') {
            $order->payment_status = 'paid';
        }
        
        $order->save();

        // Log the status change
        Log::info("Order #{$id} status changed from {$oldStatus} to {$request->status}");

        return response()->json([
            'success' => true,
            'status'  => $order->status,
            'message' => 'Order status updated successfully'
        ]);
    } catch (\Exception $e) {
        Log::error('Error updating order status: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Failed to update order status: ' . $e->getMessage()
        ], 500);
    }
}

    /**
     * USER: Place new order
     */
    public function store(Request $request)
    {
        $request->validate([
            'ship_name'     => 'required|max:150',
            'ship_phone'    => 'required|max:20',
            'ship_address1' => 'required|max:255',
            'ship_city'     => 'required|max:120',
            'items'         => 'required|array|min:1',
            'items.*.name'  => 'required|string',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            // Calculate totals
            $subtotal = 0;
            foreach ($request->items as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $shippingFee = $request->shipping_fee ?? 0;
            $discount = $request->discount ?? 0;
            $total = $subtotal + $shippingFee - $discount;

            $order = Order::create([
                'user_id'       => Auth::id(),
                'ship_name'     => $request->ship_name,
                'ship_phone'    => $request->ship_phone,
                'ship_address1' => $request->ship_address1,
                'ship_address2' => $request->ship_address2,
                'ship_city'     => $request->ship_city,
                'ship_state'    => $request->ship_state,
                'ship_postcode' => $request->ship_postcode,
                'ship_country'  => $request->ship_country ?? 'IN',
                'subtotal'      => $subtotal,
                'shipping_fee'  => $shippingFee,
                'discount'      => $discount,
                'total'         => $total,
                'payment_method'=> $request->payment_method ?? 'cod',
                'payment_status'=> 'pending',
                'status'        => 'pending',
                'notes'         => $request->notes ?? null,
            ]);

            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $item['id'] ?? null,
                    'product_name' => $item['name'],
                    'quantity'     => $item['quantity'],
                    'price'        => $item['price'],
                    'line_total'   => $item['price'] * $item['quantity'],
                    'image'        => $item['image'] ?? null,
                ]);
            }

            DB::commit();

            // Broadcast new order event if exists
            if (class_exists('App\Events\NewOrderPlaced')) {
                broadcast(new NewOrderPlaced($order))->toOthers();
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'order_id' => $order->id,
                    'message' => 'Order placed successfully!'
                ]);
            }

            return redirect()->route('checkout.success')
                ->with('success', 'Order placed successfully! Order ID: #'.$order->id);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error creating order: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'error'   => 'Failed to place order. Please try again.'
                ], 500);
            }
            
            return back()->with('error', 'Failed to place order. Please try again.')
                        ->withInput();
        }
    }
}