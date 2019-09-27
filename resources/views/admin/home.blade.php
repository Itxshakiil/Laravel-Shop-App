@extends('layouts.app')

@section('content')
<div class="">
    <a href="{{ route('products.index') }}" class="btn bg-primary m-4 text-white rounded">Product List</a>
    <a href="{{ route('orders.index') }}" class="btn bg-primary m-4 text-white rounded">Order List</a>
    <a href="{{ route('payments.index') }}" class="btn bg-primary m-4 text-white rounded">payment List</a>
    {{-- <aside class="w-64 h-screen bg-gray-100">
        <a href="">Something</a>
        <a href="">Something</a>
        <a href="">Something</a>
        <a href="">Something</a>
    </aside> --}}
</div>
@endsection