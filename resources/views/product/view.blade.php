@extends('layouts.app')
@section('content')
    <div class="container mt-6 mx-auto"> 
        <div class="md:flex border-2 rounded-lg">
            <div class="md:flex-shrink-0">
                <img class="rounded-lg md:w-56 h-64" src="/storage/{{ $product->image }}" alt="Details of {{ $product->name }}">
            </div>
            <div class="pt-4 md:mt-0 md:ml-6">
                <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">Details of {{ $product->name }}</div>
                <a href="#" class="block mt-1 text-lg leading-tight font-semibold text-green hover:underline">₹{{ $product->price }}</a>
                <p class="mt-2 text-gray-600 mb-3">
                    {{ $product->description }}
                </p>
                <form action="{{ route('order.create', $product->slug) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Order Now</button>
                    <button class="btn btn-success disabled" disabled="disabled">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection