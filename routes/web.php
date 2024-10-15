<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\HomeController;

// Route::get('dj/{id}', [HomeController::class, 'productspost']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');






//authenticated and preventbackhistory middleware used routes
Route::group(['middleware' => 'PreventBackHistory','auth'],function(){
	

// ForgotPasswordController routes password reset
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//homecontroller routes
Route::get('employees', [HomeController::class, 'employees'])->name('employees')->middleware('auth');
Route::get('changepassword', [HomeController::class, 'changepassword'])->name('changepassword')->middleware('auth');
Route::post('changepassword', [HomeController::class, 'changepasswordpost']);


//admin access only routes
Route::middleware(['IsAdmin','auth'])->group(function () {
    Route::get('/admin', function () {
        return view('home.admin');
    });
Route::get('tables', [HomeController::class, 'tables'])->name('tables');
Route::get('products/{id}', [HomeController::class, 'productspost'])->name('products/{id}');
Route::get('products', [HomeController::class, 'products'])->name('products');
Route::get('charts', [HomeController::class, 'charts'])->name('charts');

});


});