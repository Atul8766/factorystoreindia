<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
       
        return view('admin.home');
    }
    public function users(){
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
    public function customers(){
       
        return view('admin.customers');
    }
    public function commission(){
       
        return view('admin.commission');
    }
    public function profile(){
       
        return view('admin.profile');
    }
}
