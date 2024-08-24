<?php

use Illuminate\Support\Facades\Route;
use App\Models\State;
use App\Models\City;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/generate-code', [RegisterController::class, 'generateNumericCode']);

Route::get('/states/{country_id}', function ($country_id) {
    return State::where('country_id', $country_id)->get();
});

Route::get('/cities/{state_id}', function ($state_id) {
    return City::where('state_id', $state_id)->get();
});

Auth::routes();
