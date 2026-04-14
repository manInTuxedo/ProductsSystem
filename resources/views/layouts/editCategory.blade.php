@extends('master')
@section('content')

<h2>Edit Category</h2>

@if($errors->any())
    <div class='alert alert-danger'>{{ $errors->first() }}</div>
@endif

<form action='/updateCategory/{{ $category->id }}' method='POST'>
    @csrf
    @method('PUT')
    <input class='form-control mb-2' type='text' name='name' value='{{ old('name', $category->name) }}' placeholder='Category name'>
    <button class='btn btn-primary' type='submit'>Update Category</button>
</form>

@endsection