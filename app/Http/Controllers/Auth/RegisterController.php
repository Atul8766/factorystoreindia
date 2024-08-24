<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login'; // Change redirection to login page

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'generated_code' => $data['code'],
        ]);
    }



    protected function generateNumericCode($length = 6)
    {
        $code = '';
        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= rand(0, 9); // Append a random digit
            }
        } while (User::where('generated_code', $code)->exists()); // Check if code exists in the database

        return response()->json(['code' => $code]);
    }

    protected function registered($request, $user)
    {
        // Set a flash message for the login page
        session()->flash('status', 'Registration successful. Please log in.');
        return redirect($this->redirectTo);
    }
}
