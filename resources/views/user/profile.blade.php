<!-- resources/views/user/profile.blade.php -->

@extends('layouts.user.app')

@section('content')
<div class="container">
    <h2>Update Profile</h2>

    <form action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Current Password Field -->
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
            @error('current_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- New Password Field -->
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
            @error('new_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Confirm New Password Field -->
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
        </div>

        <!-- Submit Button -->
        <div class="form-group m-2">
            <button type="submit" class="btn btn-success">Update Profile</button>
        </div>
    </form>
</div>
@endsection