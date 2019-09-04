@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Details of {{ $product->name }}</h3>
    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
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