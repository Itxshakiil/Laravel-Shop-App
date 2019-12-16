@extends('layouts.app')
@section('title')
    Edit {{ $product->id }}
@endsection
@section('content')
<div class="container mx-auto">
    <h2 class="text-3xl">Edit {{ $product->name }}</h2>
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name" value="{{ old('name') ?? $product->name }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Enter product price" value="{{ old('price') ?? $product->price }}">
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
            <textarea name="description" id="description" cols="30" rows="10"
                placeholder="Enter placeholder">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Update {{ $product->name }}" class="btn bg-primary text-white">
        </div>
        @csrf
        @method('PUT')
    </form>
</div>
@endsection