<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginWithCodeController extends Controller
{
    public function loginWithCode(Request $request)
    {
        $request->validate([
            'login_code' => 'required|digits:6',
        ]);

        $user = User::where('login_code', $request->login_code)->where('status', 'approved')->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('home'); // Redirect to home or dashboard
        }

        return redirect()->back()->withErrors(['login_code' => 'Invalid or unapproved code']);
    }
}
