@extends('master')
@section('content')

<h2>Edit Product</h2>

@if($errors->any())
    <div class='alert alert-danger'>{{ $errors->first() }}</div>
@endif

<form action='/updateProduct/{{ $product->id }}' method='POST'>
    @csrf
    @method('PUT')
    <input class='form-control mb-2' type='text' name='name' value='{{ old('name', $product->name) }}' placeholder='Product name'>
    <textarea class='form-control mb-2' name='description' placeholder='Description'>{{ old('description', $product->description) }}</textarea>
    <select class='form-control mb-2' name='category_id'>
        <option value=''>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach 
    </select>
    <select class='form-control mb-2' name='status'>
        <option value='available' {{ old('status', $product->status) === 'available' ? 'selected' : '' }}>Available</option>
        <option value='out_of_stock' {{ old('status', $product->status) === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
    </select>
    <button class='btn btn-primary' type='submit'>Update Product</button>
</form>

@endsection