@extends('layouts.app')
@section('content')
<section class="home">
    <div class="home__wrapper">
        <div class="home__content overlay">
            {{-- <img src="{{ asset('storage/images/bg.jpg')}} "/> --}}
            <h2 class="x-large">Welcome to My Shop</h2>
            <p class="lead">We provide quality laptops in reasonable price.</p>
            <div class="btn btn__primary">
                <a href="{{ url('/')}} #product-section" class="btn btn-primary action-btn">Our Products</a>
            </div>
        </div>
    </div>
</section>
<section class="container mx-auto">
    <div class="section__title btn btn-primary">Latest Section</div>
    <div class="product__list">
        @foreach ($products as $product)
            <div class="card product__item product__card" title="Buy {{ $product->name }}">
                <div class="card__header">
                    <img src="/storage/{{ $product->image }}" alt="Buy {{ $product->name }}">
                </div>
                <div class="card__content">
                    <div class="product__name lead">{{ $product->name }}</div>
                    <div class="product__price text-success">₹ {{ $product->price }}</div>
                    <a href="{{ route('product.view',$product->slug) }}" class="btn btn-success">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection