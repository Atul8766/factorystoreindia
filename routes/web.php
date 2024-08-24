<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginWithCodeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\State;
use App\Models\City;

Route::post('/generate-code', [RegisterController::class, 'generateNumericCode']);


Route::get('/states/{country_id}', function ($country_id) {
  
    return State::where('country_id', $country_id)->get();
});

Route::get('/cities/{state_id}', function ($state_id) {
    return City::where('state_id', $state_id)->get();
});

Route::get('/', function () {
    return redirect()->route('login');
});
// routes/web.php

Route::get('login/user', function () {
    return view('auth.login-with-code');
})->name('login.code');

Route::post('login/code', [LoginWithCodeController::class, 'loginWithCode'])->name('login.with.code');

Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


