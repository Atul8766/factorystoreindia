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
            'code' => 'required|digits:6',
        ]);
        // dd($request->all());
        $user = User::where('generated_code', $request->code)->where('status', 'approved')->first();
        // dd($user);
        if ($user) {
            Auth::login($user);
            return redirect()->route('home'); // Redirect to home or dashboard
        }

        return redirect()->back()->withErrors(['login_code' => 'Invalid or unapproved code']);
    }
}
