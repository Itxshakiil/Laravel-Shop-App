@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Details of {{ $product->name }}</h3>
        <div class="product__container">
            <div class="product__image">
                <img src="/storage/{{ $product->image }}" alt="Details of {{ $product->name }}">
            </div>
            <div class="product__info">
                <p><strong>Name</strong> {{ $product->name }}</p>
                <p><strong>Price :</strong>{{ $product->price }}</p>
            </div>
            <div class="product__action">
                <a href="{{ 'something' }}" class="btn btn-primary">Checkout Now</a>
                <button class="btn btn-success" disabled="disabled">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection