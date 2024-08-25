@extends('layouts.user.app')

@section('content')
<div class="container">
    <h2>Add New Customer</h2>

    <form action="{{ route('user.customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Phone Field -->
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" >
            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Shop Field -->
        <div class="form-group">
            <label for="shop">Shop:</label>
            <select class="form-control @error('shop') is-invalid @enderror" id="shop" name="shop" >
                <option value="">Select Shop</option>
                @foreach ($shops as $shop)
                <option value="{{ $shop->id }}" {{ old('shop') == $shop->id ? 'selected' : '' }}>{{ $shop->name }}</option>
                @endforeach
            </select>
            @error('shop')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group m-2">
            <button type="submit" class="btn btn-success">Add Customer</button>
        </div>
    </form>

</div>
@endsection