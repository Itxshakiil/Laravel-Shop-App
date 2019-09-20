@extends('layouts.app')
@section('content')
<section class="home">
    <div class="text-center text-white">
        <div class="home__content overlay">
            <h2 class="text-6xl">Welcome to My Shop</h2>
            <p class="text-2xl">We provide quality laptops in reasonable price.</p>
            <div class="mt-3">
                <a href="{{ url('/')}} #product-section" class="btn bg-primary rounded">Our Products</a>
            </div>
        </div>
    </div>
</section>
<section class="container mx-auto text-white">
    <div class="btn bg-primary rounded m-4">Latest Section</div>
    <div class="flex flex-wrap items-stretch">
        @foreach ($products as $product)
            <div class="card flex-product m-5" title="View Details of {{ $product->name }}">
                <div class="card__header">
                    <img src="/storage/{{ $product->image }}" alt="View Details of {{ $product->name }}">
                </div>
                <div class="text-center p-3">
                    <div class="text-2xl">{{ $product->name }}</div>
                    <div class="text-success">₹{{ $product->price }}</div>
                    <a href="{{ route('product.view',$product->slug) }}" class="btn bg-success rounded text-white m-1">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection