@extends('master')
@section('content')
<h2>Products List</h2>

@if(session('success'))
    <div class='alert alert-success'>{{ session('success') }}</div>
@endif

<div class='mb-3'>
    <a class='btn btn-primary' href='/viewForm'>Add New Product</a>
</div>

@forelse($products as $product)
    <div class='card mb-3'>
        <div class='card-body'>
            <h5>{{ $product->name }}</h5>
            <p>{{ $product->description }}</p>
            <p><strong>Category:</strong> {{ $product->category ? $product->category->name : 'No Category' }}</p>
            <span class='badge bg-success'>{{ ucfirst(str_replace('_', ' ', $product->status)) }}</span>
            <div class='mt-3'>
                <a class='btn btn-sm btn-secondary me-2' href='/editProduct/{{ $product->id }}'>Edit</a>
                <form action='/deleteProduct/{{ $product->id }}' method='POST' class='d-inline'>
                    @csrf
                    <button type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class='alert alert-info'>No products found. Add one now.</div>
@endforelse
@endsection
