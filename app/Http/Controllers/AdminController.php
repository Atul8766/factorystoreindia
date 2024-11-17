<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.home');
    }
    public function users()
    {
        $userData = User::where('type', '0')
            ->leftJoin('countries', 'countries.id', '=', 'users.country_id')
            ->leftJoin('states', 'states.id', '=', 'users.state_id')
            ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
            ->select(
                'users.*',
                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )
            ->get()
            ->toArray();
        return view('admin.users', ['userData' => $userData]);
    }
    public function customers()
    {

        return view('admin.customers');
    }
    public function commission()
    {

        return view('admin.commission');
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function profile()
    {

        return view('admin.profile');
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

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
    public function updateStatus(Request $request)
    {
        $user = User::find($request->id); // Find the user by ID
        $user->status = $request->status; // Update the status
        $user->save(); // Save changes

        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    }
}
