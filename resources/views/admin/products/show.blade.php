@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <h3 class="text-blue-400 text-3xl">Details of {{ $product->name }}</h3>
    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('products.destroy',$product->id) }}" method="POST" onsubmit="event.preventDefault();if(confirm('Are you sure to Delete?')){event.target.submit();}">
        <button type="submit" class="btn btn-primary">Delete</button>
        @csrf
        @method('delete')
    </form>
    {{-- <a href="{{ route('products.destroy',$product->id) }}" class="btn btn-primary">Delete</a> --}}
    <br>
    <img src="/storage/{{ $product->image }}" alt="" height="250px">
    <p> <strong>Id :</strong>{{ $product->id }} </p>
    <p><strong>Name :</strong>{{ $product->name }}</p>
    <p><strong>Price :</strong>{{ $product->price }}</p>
    <p><strong>Description :</strong>{{ $product->description }}</p>
    <p></p>
    <p></p>
</div>
@endsection