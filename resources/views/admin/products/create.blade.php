@extends('layouts.app')
@section('title','Add Product')
@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl">Add Product</h2>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name"
                value="{{ $product->name ?? old('name') }}">@error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Enter product price"
                value="{{ $product->price ??old('price')  }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" placeholder="Enter product image">
            <small class="input-hint">Only valid image allowed. i.e. .jpg, .jpeg, .png</small>
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <textarea name="description" id="description" cols="30" rows="10"
                placeholder="Enter placeholder">{{ $product->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Add Product" class="btn bg-primary text-white">
        </div>
        @csrf
    </form>
</div>
@endsection