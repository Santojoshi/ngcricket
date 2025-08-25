@extends('front.app')

@section('frontcontent')
<div class="container">
  <h3 class="mb-3">Your Cart</h3>

  {{-- Flash messages --}}
  @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

  @if($items->isEmpty())
    <div class="alert alert-info">Your cart is empty.</div>
  @else
    <div class="table-responsive">
      <table class="table align-middle">
        <thead><tr>
          <th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th></th>
        </tr></thead>
        <tbody>
        @foreach($items as $item)
          <tr data-id="{{ $item->id }}">
            <td class="d-flex align-items-center gap-2">
              @if(($item->attributes['image'] ?? null))
                <img src="{{ url('public/upload/product/'.$item->attributes['image']) }}" width="60" class="rounded">
              @endif
              <div>{{ $item->name }}</div>
            </td>
            <td style="max-width:120px">
              <div class="input-group">
                <button class="btn btn-outline-secondary btn-qty" data-delta="-1">-</button>
                <input type="number" class="form-control text-center qty-input" value="{{ $item->quantity }}" min="1">
                <button class="btn btn-outline-secondary btn-qty" data-delta="1">+</button>
              </div>
            </td>
            <td>₹{{ number_format($item->price,2) }}</td>
            <td class="line-total">₹{{ number_format($item->price * $item->quantity,2) }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-link text-danger btn-remove">Remove</button>
            </td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3" class="text-end">Grand Total</th>
            <th id="cart-grand">₹{{ number_format($total,2) }}</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>

    <div class="d-flex justify-content-end">
      @auth
        <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
      @else
        <button class="btn btn-success btn-lg" id="btnCheckout">Proceed to Checkout</button>
      @endauth
    </div>
  @endif
</div>

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
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-login" type="button" role="tab">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-register" type="button" role="tab">Register</button>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-login" role="tabpanel">
            <form id="loginForm">@csrf
              <div class="mb-3"><label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3"><label class="form-label">Password</label>
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

          <div class="tab-pane fade" id="tab-register" role="tabpanel">
            <form id="registerForm">@csrf
              <div class="mb-3"><label class="form-label">Name</label>
                <input name="name" class="form-control" required>
              </div>
              <div class="mb-3"><label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required>
              </div>
              <div class="mb-3"><label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required>
              </div>
              <div class="mb-3"><label class="form-label">Confirm Password</label>
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

@push('scripts')
<script>
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const authModal = new bootstrap.Modal(document.getElementById('authModal'));

function showErrors(containerId, errors) {
  document.getElementById(containerId).innerHTML =
    Array.isArray(errors) ? errors.join('<br>') : (errors || '');
}

// Helper: fetch JSON with CSRF
async function postJSON(url, body, asForm=false) {
  const opts = {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': token, 'X-Requested-With':'XMLHttpRequest', 'Accept':'application/json' }
  };
  opts.body = asForm ? new FormData(body) : JSON.stringify(body);
  if (!asForm) opts.headers['Content-Type'] = 'application/json';

  const res = await fetch(url, opts);
  if (res.ok) return {ok:true, data:await res.json().catch(()=>({}))};
  if (res.status===422) {
    const data = await res.json();
    const msgs=[]; for (const k in data.errors) msgs.push(data.errors[k][0]);
    return {ok:false, errors:msgs};
  }
  return {ok:false, errors:['Unexpected error']};
}

// Guest checkout -> show modal
const btnCheckout = document.getElementById('btnCheckout');
if (btnCheckout) btnCheckout.addEventListener('click', ()=>authModal.show());

// Login form
document.getElementById('loginForm')?.addEventListener('submit', async e=>{
  e.preventDefault(); showErrors('loginErrors','');
  const out = await postJSON('{{ route('login') }}', e.target, true);
  if(out.ok){ window.location='{{ route('checkout.index') }}'; }
  else showErrors('loginErrors', out.errors);
});

// Register form
document.getElementById('registerForm')?.addEventListener('submit', async e=>{
  e.preventDefault(); showErrors('registerErrors','');
  const out = await postJSON('{{ route('register') }}', e.target, true);
  if(out.ok){ window.location='{{ route('checkout.index') }}'; }
  else showErrors('registerErrors', out.errors);
});

// Qty update
document.querySelectorAll('.btn-qty').forEach(btn=>{
  btn.addEventListener('click', async e=>{
    const tr=e.target.closest('tr'); const id=tr.dataset.id;
    const input=tr.querySelector('.qty-input'); let qty=parseInt(input.value||1,10);
    qty+=parseInt(btn.dataset.delta,10); qty=Math.max(1,qty); input.value=qty;

    const res=await postJSON('{{ url('/cart/update') }}/'+id, {quantity:qty});
    if(res.ok){
      const price=parseFloat(tr.children[2].innerText.replace(/[₹,]/g,''));
      tr.querySelector('.line-total').innerText='₹'+(price*qty).toFixed(2);
      document.getElementById('cart-grand').innerText='₹'+parseFloat(res.data.total).toFixed(2);
    }
  });
});

// Remove item
document.querySelectorAll('.btn-remove').forEach(btn=>{
  btn.addEventListener('click', async e=>{
    const tr=e.target.closest('tr'); const id=tr.dataset.id;
    const res=await postJSON('{{ url('/cart/remove') }}/'+id, {}, false);
    if(res.ok){ tr.remove(); document.getElementById('cart-grand').innerText='₹'+parseFloat(res.data.total).toFixed(2); }
  });
});
</script>
@endpush
