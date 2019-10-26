@extends('layouts.app')
@section('content')
<div class="container mx-auto overflow-hidden">
    <h3 class="text-3xl my-2">Product List</h3>
    <a href="{{ route('products.create') }}" class="btn bg-primary text-white rounded mb-2">Add Product</a>
    <table class="overflow-y-auto w-full text-center border-collapse">
        <tr class="bg-gray-300">
            <th class="p-3">Id</th>
            <th class="p-3">Name</th>
            <th class="p-3">Price</th>
            <th class="p-3">Description</th>
            <th class="p-3">Image</th>
            <th class="p-3">last Updated</th>
            <th class="p-3">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr class="border-gray-300 border-b">
            <td class="p-3">{{ $product->id }}</td>
            <td class="p-3">{{ $product->name }}</td>
            <td class="p-3">{{ $product->price }}</td>
            <td class="p-3">{{ Str::limit($product->description,30) }}</td>
            <td class="p-3">{{ $product->image }}</td>
            <td class="p-3">{{ $product->updated_at }}</td>
            <td class="p-3"><a href="{{ route('products.show',['id'=> $product->id]) }}">View</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection