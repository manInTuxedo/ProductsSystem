@extends('master')
@section('content')

<h2>Add New Product</h2>

@if($errors->any())
    <div class='alert alert-danger'>{{ $errors->first() }}</div>
@endif

<form action='/addProduct' method='POST'>
    @csrf
    <input class='form-control mb-2' type='text' name='name' value='{{ old('name') }}' placeholder='Product name'>
    <textarea class='form-control mb-2' name='description' placeholder='Description'>{{ old('description') }}</textarea>
    <select class='form-control mb-2' name='category_id'>
        <option value=''>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach 
    </select>
    <select class='form-control mb-2' name='status'>
        <option value='available' {{ old('status') === 'available' ? 'selected' : '' }}>Available</option>
        <option value='out_of_stock' {{ old('status') === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
    </select>
    <button class='btn btn-primary' type='submit'>Add Product</button>
</form>

@endsection