<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
       
        return view('user.home');
    }
    
    public function customers(){
       
        return view('user.customers');
    }
    public function commission(){
       
        return view('user.commission');
    }
    public function profile(){
       
        return view('user.profile');
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // Handle the profile update
    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'current_password' => 'nullable|required_with:new_password|string|min:6',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password is provided and correct
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            // Update the password if the new password is provided
            if ($request->filled('new_password')) {
                $user->password = Hash::make($request->new_password);
            }
        }

        // Update the user's profile
        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
