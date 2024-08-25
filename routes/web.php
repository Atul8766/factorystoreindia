<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginWithCodeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\State;
use App\Models\City;
use App\Http\Controllers\ShopController;

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
  
    Route::get('/dashboard', [UserController::class, 'index'])->name('home');
});
  

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout.admin');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    
    Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/admin/commission', [AdminController::class, 'commission'])->name('admin.commission');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('shops', ShopController::class);
    });
  
});
  



