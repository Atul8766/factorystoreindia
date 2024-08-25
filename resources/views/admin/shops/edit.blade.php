@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Edit Shop</h2>

    <form action="{{ route('admin.shops.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Shop Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $shop->name }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Shop Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo">
            <img src="{{ asset('storage/app/' . $shop->logo) }}" width="100" alt="Logo">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" required>{{ $shop->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $shop->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$shop->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Shop</button>
    </form>
</div>
@endsection
