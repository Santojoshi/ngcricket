@extends('front.app')

@section('frontcontent')
<div class="container">
    <h5 class="mt-3 mb-4 p-2 bg-light">Checkout</h5>

    @if(session('error'))   <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    @php
        $items = $cart ?? collect();
        $subtotal = $items->sum(fn($i) => $i->price * $i->quantity);
        $shipping = 50; // static shipping
        $discount = 0;  // you can integrate coupon later
        $total = $subtotal + $shipping - $discount;
    @endphp

    <div class="row">
        <!-- Checkout Form -->
        <div class="col-lg-7">
            <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm" class="mb-4">
                @csrf
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <!-- Shipping -->
                <div class="mb-3"><div class="form-section-title">Shipping Address</div></div>
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Full Name</label><input name="ship_name" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">Phone</label><input name="ship_phone" class="form-control" required></div>
                    <div class="col-12"><label class="form-label">Address Line 1</label><input name="ship_address1" class="form-control" required></div>
                    <div class="col-12"><label class="form-label">Address Line 2</label><input name="ship_address2" class="form-control"></div>
                    <div class="col-md-4"><label class="form-label">City</label><input name="ship_city" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">State</label><input name="ship_state" class="form-control"></div>
                    <div class="col-md-4"><label class="form-label">Postcode</label><input name="ship_postcode" class="form-control"></div>
                    <div class="col-md-4"><label class="form-label">Country</label><input name="ship_country" class="form-control" value="IN"></div>
                </div>

                <hr class="my-4">

                <!-- Billing toggle -->
                <input type="hidden" name="billing_same_as_shipping" value="0">
<input class="form-check-input" type="checkbox" 
       id="billing_same_as_shipping" 
       name="billing_same_as_shipping" 
       value="1" 
       {{ old('billing_same_as_shipping', true) ? 'checked' : '' }}>
<label class="form-check-label" for="billing_same_as_shipping">
    Billing address same as shipping
</label>

                <div id="billingFields" class="d-none">
                    <div class="mb-3"><div class="form-section-title">Billing Address</div></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Full Name</label><input name="bill_name" class="form-control"></div>
                        <div class="col-md-6"><label class="form-label">Phone</label><input name="bill_phone" class="form-control"></div>
                        <div class="col-12"><label class="form-label">Address Line 1</label><input name="bill_address1" class="form-control"></div>
                        <div class="col-12"><label class="form-label">Address Line 2</label><input name="bill_address2" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">City</label><input name="bill_city" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">State</label><input name="bill_state" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Postcode</label><input name="bill_postcode" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Country</label><input name="bill_country" class="form-control" value="IN"></div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Payment -->
                <div class="mb-3"><div class="form-section-title">Payment</div></div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="cod" id="pm1" checked>
                    <label class="form-check-label" for="pm1">Cash on Delivery</label>
                </div>

                <button class="btn btn-primary mt-4" type="submit">Place Order</button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    <ul class="list-group mb-3">
                        @foreach($items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                @if(($item->attributes['image'] ?? null))
                                    <img src="{{ url('public/upload/product/'.$item->attributes['image']) }}" width="50" class="rounded">
                                @endif
                                <div>
                                    <div class="fw-semibold">{{ $item->name }}</div>
                                    <small>Qty: {{ $item->quantity }}</small>
                                </div>
                            </div>
                            <span>₹{{ number_format($item->price * $item->quantity,2) }}</span>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between"><span>Subtotal</span><strong>₹{{ number_format($subtotal,2) }}</strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span>Shipping</span><strong>₹{{ number_format($shipping,2) }}</strong></li>
                        @if($discount > 0)
                            <li class="list-group-item d-flex justify-content-between"><span>Discount</span><strong>-₹{{ number_format($discount,2) }}</strong></li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between"><span>Total</span><strong>₹{{ number_format($total,2) }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const same = document.getElementById('sameAsShip');
    const billing = document.getElementById('billingFields');

    function toggleBilling() {
        if(same.checked) {
            billing.classList.add('d-none');
        } else {
            billing.classList.remove('d-none');
        }
    }

    same.addEventListener('change', toggleBilling);
    toggleBilling();
});
</script>
@endsection
