@extends('layouts.app')

@section('content')
<div class="container">
  <div class="alert alert-success">{{ session('success') ?? 'Order placed successfully!' }}</div>
  <a class="btn btn-primary" href="{{ url('/') }}">Back to shop</a>
</div>
@endsection
