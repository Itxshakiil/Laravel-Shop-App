@extends('layouts.app')
@section('title')
    Details of {{ $product->id }}
@endsection
@section('content')
<div class="container mt-6 mx-auto"> 
    <a href="./" class="text-lg text-teal-600">Go Back</a>
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
                
                <a href="{{ route('products.edit',$product->id) }}" class="btn bg-primary text-white rounded mb-2">Edit</a>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="event.preventDefault();if(confirm('Are you sure to Delete?')){event.target.submit();}">
                    <button type="submit" class="btn bg-primary text-white rounded">Delete</button>
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
@endsection