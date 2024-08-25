@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Add New Shop</h2>

    <form action="{{ route('admin.shops.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Shop Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="logo">Shop Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Shop</button>
    </form>
</div>
@endsection
