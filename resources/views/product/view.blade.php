@extends('layouts.app')
@section('title')
    Details of {{$product->name }}
@endsection
@section('content')
    <div class="container mt-6 mx-auto"> 
        <div class="md:flex border-2 rounded-lg">
            <div class="md:flex-shrink-0">
                <img class="rounded-lg md:w-56 h-64" src="/storage/{{ $product->image }}" alt="Details of {{ $product->name }}">
            </div>
            <div class="pt-4 md:mt-0 md:ml-6">
                <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">Details of {{ $product->name }}</div>
                <p class="block mt-1 text-lg leading-tight font-semibold">₹{{ $product->price }}</p>
                <p class="mt-2 text-gray-600 mb-3">
                    {{ $product->description }}
                </p>
                <form action="{{ route('cart.store',$product->id) }}" method="post">
                    @csrf
                <input type="hidden" name="id" value="{{$product->id }}">
                <input type="hidden" name="name" value="{{$product->name }}">
                <input type="hidden" name="price" value="{{$product->price }}">
                <input type="hidden" name="image" value="{{$product->image }}">
                <button class="btn bg-primary text-white rounded">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection