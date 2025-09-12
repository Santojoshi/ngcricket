<div class="modal-header">
    <h5 class="modal-title">Order #{{ $order->id }} Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <h6>Customer Information</h6>
            <p><strong>Name:</strong> {{ $order->ship_name }}</p>
            <p><strong>Phone:</strong> {{ $order->ship_phone }}</p>
            <p><strong>Address:</strong> {{ $order->ship_address1 }}, {{ $order->ship_city }}</p>
        </div>
        <div class="col-md-6">
            <h6>Order Information</h6>
            <p><strong>Status:</strong> <span class="badge bg-primary">{{ ucfirst($order->status) }}</span></p>
            <p><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</p>
            <p><strong>Placed:</strong> {{ $order->created_at->format('M j, Y g:i A') }}</p>
        </div>
    </div>
    
    <hr>
    
    <h6>Order Items</h6>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->price, 2) }}</td>
                <td>₹{{ number_format($item->line_total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>