@extends('admin.pannel.app')

@section('content')
<div class="container">
    <h2>Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            @foreach($orders as $order)
            <tr id="orderRow-{{ $order->id }}">
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td>${{ number_format($order->total,2) }}</td>
                <td>
                    <span class="badge bg-primary">{{ ucfirst($order->status) }}</span>
                </td>
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>

                    <select class="form-select d-inline-block w-auto"
                        onchange="updateOrderStatus({{ $order->id }}, this.value)">
                        <option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>
                        <option value="accepted" {{ $order->status=='accepted'?'selected':'' }}>Accepted</option>
                        <option value="packed" {{ $order->status=='packed'?'selected':'' }}>Packed</option>
                        <option value="shipped" {{ $order->status=='shipped'?'selected':'' }}>Shipped</option>
                        <option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function updateOrderStatus(orderId, status) {
    fetch(`/admin/orders/${orderId}/status`, {
        method: 'POST',
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ status: status })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert("Order status updated to " + data.status);
        }
    })
    .catch(err => console.error(err));
}
</script>
@endsection
