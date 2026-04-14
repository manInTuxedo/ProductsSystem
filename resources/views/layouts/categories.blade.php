@extends('master')
@section('content')

<h2>Categories</h2>

@if(session('success'))
    <div class='alert alert-success'>{{ session('success') }}</div>
@endif

<a href='/viewCategoryForm' class='btn btn-primary mb-3'>Add New Category</a>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href='/editCategory/{{ $category->id }}' class='btn btn-warning'>Edit</a>
                <form action='/deleteCategory/{{ $category->id }}' method='POST' style='display:inline;'>
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='btn btn-danger' onclick='return confirm("Are you sure?")'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection