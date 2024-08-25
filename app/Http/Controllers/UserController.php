<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
