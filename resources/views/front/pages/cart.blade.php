@extends('layouts.app')

@section('content')


<style>
  .qty-box {
    display: flex;
    align-items: center;
    border-radius: 6px;
    overflow: hidden;
    width: fit-content;
    background: #fff;
  }

  .qty-btn {
    width: 42px;
    height: 42px;
    border: none;
    background: #f1f3f6;
    /* Flipkart style grey */
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    user-select: none;
  }

  .qty-btn:hover {
    background: #e0e0e0;
  }

  .qty-input {
    width: 60px;
    height: 42px;
    border: none;
    text-align: center;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    outline: none;
    line-height: 42px;
    /* vertical centering */
    
  }
  .cart_qty{
      padding: 10px 0 0 0;
    }
</style>
<div class="container py-8">
  <h4 class="my-30 fw-semibold">🛒 Your Cart</h4>

  @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

  @if($items->isEmpty())
  <div class="alert alert-info text-center py-20">
    <h5>Your cart is empty.</h5>
    <a href="{{ url('/') }}" class="btn btn-primary mt-2">Continue Shopping</a>
  </div>
  @else
  <div class="row g-3">
    {{-- Cart Items --}}
    <div class="col-lg-8">
      @foreach($items as $item)
      <div class="card shadow-sm border-0 rounded-3 mb-3 cart-item" data-id="{{ $item->id }}">
        <div class="card-body d-flex flex-column flex-md-row align-items-md-center gap-3">
          @if(($item->attributes['image'] ?? null))
          <img src="{{ url('public/upload/product/'.$item->attributes['image']) }}" class="rounded" width="90"
            height="90" style="object-fit:cover">
          @endif
          <div class="flex-grow-1">
            <h6 class="mb-1">{{ $item->name }}</h6>
            <div class="text-muted small">₹{{ number_format($item->price,2) }}</div>

            {{-- Qty Controls --}}

            <div class="qty-box mt-5">
              <button type="button" class="qty-btn" data-delta="-1">−</button>
              <input type="number" class="qty-input cart_qty pt-8" value="{{ $item->quantity }}" min="1">
              <button type="button" class="qty-btn" data-delta="1">+</button>
            </div>

            <div class="mt-2 fw-semibold line-total">
              ₹{{ number_format($item->price * $item->quantity,2) }}
            </div>
          </div>

          <form method="POST" action="{{ route('cart.remove',$item->id) }}" class="ms-md-auto mt-2 mt-md-0">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Remove</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Price Summary --}}
    <div class="col-lg-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
          <h5 class="mb-3">Price Details</h5>
          <div class="d-flex justify-content-between mb-2">
            <span>Subtotal</span>
            <span id="cart-grand">₹{{ number_format($total,2) }}</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-bold">
            <span>Grand Total</span>
            <span id="cart-grand-final">₹{{ number_format($total,2) }}</span>
          </div>
        </div>
        <div class="card-footer bg-white">
          @auth
          <a href="{{ route('checkout.index') }}" class="btn btn-success w-100 btn-lg">Proceed to Checkout</a>
          @else
          <button class="btn btn-success w-100 btn-lg" id="btnCheckout">Proceed to Checkout</button>
          @endauth
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

{{-- Sticky Checkout (Mobile only) --}}
@if(!$items->isEmpty())
<div class="d-lg-none sticky-bottom bg-white border-top px-20 py-10 shadow-sm">
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <div class="small text-muted">Total</div>
      <div class="fw-bold" id="cart-grand-mobile">₹{{ number_format($total,2) }}</div>
    </div>
    @auth
    <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">Checkout</a>
    @else
    <button class="btn btn-success btn-lg" id="btnCheckoutMobile">Checkout</button>
    @endauth
  </div>
</div>
@endif

{{-- LOGIN/REGISTER MODAL --}}
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-20">
      <div class="modal-header">
        <h5 class="modal-title">Login or Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills mb-3" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-login" type="button"
              role="tab">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-register" type="button"
              role="tab">Register</button>
          </li>
        </ul>
        <div class="tab-content">
          {{-- Login Form --}}
          <div class="tab-pane fade show active" id="tab-login" role="tabpanel">
            <form id="loginForm">
              @csrf
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <div class="text-danger small" id="loginErrors"></div>
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
          </div>

          {{-- Register Form --}}
          <div class="tab-pane fade" id="tab-register" role="tabpanel">
            <form id="registerForm">
              @csrf
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" required>
              </div>
              <div class="text-danger small" id="registerErrors"></div>
              <button class="btn btn-success w-100" type="submit">Create Account</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <small class="text-muted">You’ll be redirected back to checkout after login/registration.</small>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .cart-item:hover {
    background: #f9fafb;
    transition: 0.2s ease-in-out;
  }

  .sticky-bottom {
    z-index: 1050;
    /* keeps mobile checkout above */
  }
</style>
@endpush

@push('scripts')
<script>
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const authModal = new bootstrap.Modal(document.getElementById('authModal'));

  // Show modal if guest clicks checkout
  document.getElementById('btnCheckout')?.addEventListener('click', () => authModal.show());
  document.getElementById('btnCheckoutMobile')?.addEventListener('click', () => authModal.show());

  // Helpers
  function showErrors(containerId, errors) {
    const el = document.getElementById(containerId);
    el.innerHTML = Array.isArray(errors) ? errors.join('<br>') : (errors || '');
  }

  async function postJSON(url, form) {
    const formData = new FormData(form);
    const res = await fetch(url, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': token,
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      },
      body: formData
    });
    if (res.ok) return { ok: true };
    if (res.status === 422) {
      const data = await res.json();
      const msgs = [];
      for (const k in data.errors) { msgs.push(data.errors[k][0]); }
      return { ok: false, errors: msgs };
    }
    const text = await res.text();
    return { ok: false, errors: [text] };
  }

  // Login AJAX
  document.getElementById('loginForm')?.addEventListener('submit', async (e) => {
    e.preventDefault();
    showErrors('loginErrors', '');
    const out = await postJSON('{{ route('login') }}', e.target);
    if (out.ok) {
      window.location.href = '{{ route('checkout.index') }}';
    } else {
      showErrors('loginErrors', out.errors);
    }
  });

  // Register AJAX
  document.getElementById('registerForm')?.addEventListener('submit', async (e) => {
    e.preventDefault();
    showErrors('registerErrors', '');
    const out = await postJSON('{{ route('register') }}', e.target);
    if (out.ok) {
      window.location.href = '{{ route('checkout.index') }}';
    } else {
      showErrors('registerErrors', out.errors);
    }
  });

  // Qty update inline
  document.querySelectorAll('.qty-btn').forEach(btn => {
  btn.addEventListener('click', async (e) => {
    const tr = e.target.closest('.cart-item');
    const input = tr.querySelector('.qty-input');
    let qty = parseInt(input.value || '1', 10);
    qty += parseInt(e.target.dataset.delta,10);
    qty = Math.max(1, qty);
    input.value = qty;
    const id = tr.dataset.id;

    const res = await fetch('{{ url('/cart/update') }}/' + id, {
      method:'POST',
      headers:{
        'X-CSRF-TOKEN': token,
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type':'application/json'
      },
      body: JSON.stringify({ quantity: qty })
    });
    const data = await res.json();
    if (data.ok) {
      const price = parseFloat(tr.querySelector('.text-muted').innerText.replace('₹','').replace(/,/g,''));
      tr.querySelector('.line-total').innerText = '₹' + (price * qty).toFixed(2);
      document.getElementById('cart-grand').innerText = '₹' + parseFloat(data.total).toFixed(2);
      document.getElementById('cart-grand-final').innerText = '₹' + parseFloat(data.total).toFixed(2);
      document.getElementById('cart-grand-mobile').innerText = '₹' + parseFloat(data.total).toFixed(2);
    }
  });
});

</script>
@endpush