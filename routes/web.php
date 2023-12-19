<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//test Controller (Only for testing purposes)
Route::get('/test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');


//public routes
Route::get('/', [\App\Http\Controllers\Welcome\HomeController::class, 'index'])->name('home');
Route::prefix('company')->as('company.')->group(function ()
{
    // Route::get('setup', [\App\Http\Controllers\Livewire\Erp\Company\Setup::class, '__invoke'])->name('setup');
    Route::get('setup', [App\Http\Controllers\Livewire\Common\Company\CompanySetup::class, '__invoke'])->name('setup');
});

//auth routes
Route::get('/login', [\App\Http\Controllers\Livewire\Auth\Login::class, '__invoke'])->name('login');
Route::get('/signup', [\App\Http\Controllers\Livewire\Auth\SignUp::class, '__invoke'])->name('signup');
Route::get('/logout', [\App\Http\Controllers\Welcome\HomeController::class, 'logout'])->name('logout');
Route::get('password-forget', [\App\Http\Controllers\Livewire\Auth\ForgotPassword::class, '__invoke'])->name('password-forget');
Route::get('/verify-email/{token}', [\App\Http\Controllers\Welcome\HomeController::class, 'verifyEmail'])->name('verify.email');

// home protected route
Route::middleware(['auth', 'plan.check', 'isCustomer'])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Welcome\HomeController::class, 'dashboard'])->name('main.dashboard');

    Route::resource('profile', \App\Http\Controllers\Common\ProfileController::class);

});

Route::get('checkout/{plan_id}/{planSlug}', [\App\Http\Controllers\Livewire\Common\Payment\Checkout::class, '__invoke'])->name('checkout');