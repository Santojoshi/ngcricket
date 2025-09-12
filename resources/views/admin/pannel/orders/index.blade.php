@extends('admin.pannel.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Orders</h2>

    <!-- Active Orders -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark fw-bold">🟡 Active Orders</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Placed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeOrders as $order)
                    <tr id="order-{{ $order->id }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td>₹{{ number_format($order->total, 2) }}</td>
                        <td>
                            <select class="form-select form-select-sm status-dropdown" data-id="{{ $order->id }}">
                                <option value="pending"   {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="accepted"  {{ $order->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="packed"    {{ $order->status == 'packed' ? 'selected' : '' }}>Packed</option>
                                <option value="shipped"   {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td>
                            <button class="btn btn-sm btn-info view-order" data-id="{{ $order->id }}">View</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Completed Orders -->
    <div class="card">
        <div class="card-header bg-success text-white fw-bold">✅ Completed Orders</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Placed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($completedOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                        <td>₹{{ number_format($order->total, 2) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td>
                            <button class="btn btn-sm btn-info view-order" data-id="{{ $order->id }}">View</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="orderModalContent">
      <!-- Partial HTML will load here -->
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM loaded, initializing order management...");
    
    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "{{ csrf_token() }}";
    console.log("CSRF Token:", csrfToken);
    
    /**
     * 🔹 Fetch helper with method & headers
     */
    async function sendRequest(url, method = "GET", data = null) {
        console.log(`Sending ${method} request to: ${url}`);
        
        const options = {
            method: method,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": csrfToken,
            }
        };

        if (data && method !== "GET") {
            options.headers["Content-Type"] = "application/json";
            options.body = JSON.stringify(data);
        }

        try {
            const response = await fetch(url, options);
            console.log(`Response status: ${response.status}`);
            
            if (!response.ok) {
                throw new Error(`HTTP ${response.status} — ${response.statusText}`);
            }
            
            // Check content type to determine how to parse
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.includes("application/json")) {
                return await response.json();
            } else {
                return await response.text();
            }
        } catch (error) {
            console.error("Request failed:", error);
            throw error;
        }
    }

    /**
     * 🔹 Open modal with order details
     */
    document.addEventListener("click", async (e) => {
        if (e.target.classList.contains("view-order")) {
            let orderId = e.target.dataset.id;
            console.log(`Loading order details for ID: ${orderId}`);

            try {
                let response = await sendRequest(`/ngcricket/admin/orders/${orderId}`, "GET");
                
                if (typeof response === 'object') {
                    // If we got JSON back, there was an error
                    console.error("Error response:", response);
                    document.querySelector("#orderModalContent").innerHTML =
                        `<div class="p-3 text-danger">Error: ${response.error || 'Unknown error'}</div>`;
                } else {
                    // We got HTML back
                    document.querySelector("#orderModalContent").innerHTML = response;
                }
                
                new bootstrap.Modal(document.getElementById("orderModal")).show();
            } catch (err) {
                console.error("❌ Could not load order:", err);
                document.querySelector("#orderModalContent").innerHTML =
                    `<div class="p-3 text-danger">Could not load order details: ${err.message}</div>`;
                new bootstrap.Modal(document.getElementById("orderModal")).show();
            }
        }
    });

    /**
     * 🔹 Update order status (POST)
     */
    document.addEventListener("change", async (e) => {
        if (e.target.classList.contains("status-dropdown")) {
            let orderId = e.target.dataset.id;
            let status = e.target.value;
            
            console.log(`Updating order ${orderId} to status: ${status}`);
            
            // Show loading state
            const originalValue = e.target.value;
            e.target.disabled = true;

            try {
                let data = await sendRequest(
                    `/ngcricket/admin/orders/${orderId}/status`, 
                    "POST", 
                    { status: status }
                );
                
                console.log("Response data:", data);

                if (data.success) {
                    console.log("✅ Status updated:", data.status);
                    alert('Status updated successfully');
                } else {
                    console.error("❌ Update failed:", data);
                    alert('Failed to update status: ' + (data.message || 'Unknown error'));
                    e.target.value = originalValue; // Revert the selection
                }
            } catch (err) {
                console.error("❌ Error updating status:", err);
                alert('Error updating status: ' + err.message);
                e.target.value = originalValue; // Revert the selection
            } finally {
                e.target.disabled = false;
            }
        }
    });
});
</script>


@endsection
