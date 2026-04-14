@extends('master')
@section('content')

<h2>Add New Category</h2>

@if($errors->any())
    <div class='alert alert-danger'>{{ $errors->first() }}</div>
@endif

<form action='/addCategory' method='POST'>
    @csrf
    <input class='form-control mb-2' type='text' name='name' value='{{ old('name') }}' placeholder='Category name'>
    <button class='btn btn-primary' type='submit'>Add Category</button>
</form>

@endsection