@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <h3 class="text-3xl mt-2">Product List</h3>
    <a href="{{ route('products.create') }}" class="btn bg-primary text-white rounded">Add Product</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>last Updated</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->updated_at }}</td>
            <td><a href="{{ route('products.show',['id'=> $product->id]) }}">View</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection