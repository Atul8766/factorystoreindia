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
            'phone' => ['required', 'string', 'max:15', 'unique:users'], // Assuming phone numbers are unique
            'pan_card_id' => ['required', 'string', 'size:10', 'unique:users'], // PAN card has a fixed length of 10 characters
            'upi_id' => ['required', 'string', 'max:50', 'unique:users'], // Assuming UPI ID has a maximum length
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
            'phone' => $data['phone'],
            'pan_card_id' => $data['pan_card_id'],
            'upi_id' => $data['upi_id'],
            'generated_code' => $data['code'],
            'password' => Hash::make($data['code']),
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
