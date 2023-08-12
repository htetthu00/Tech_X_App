<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CoursesController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\InstructorController;
use App\Http\Controllers\Frontend\Auth\UserLoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\UserRegisterController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationController;
use App\Http\Controllers\Frontend\Auth\UserResetPasswordController;
use App\Http\Controllers\Frontend\Auth\UserForgotPasswordController;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'guest:admin'
], function () {

    #auth -> login
    Route::get('login', [LoginController::class, 'index'])->name('get.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');


    #auth->forgot-password
    Route::get('forgot-password', [ForgotPasswordController::class, 'getForgotForm'])->name('admin.getForgot');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('admin.sendResetLink');

    #auth->reset-password
    Route::get('reset-password', [ResetPasswordController::class, 'resetVerify'])->name('admin.resetVerily');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('admin.resetPassword');

});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin'
], function() {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');
    
    #Admin CRUD
    Route::resource('admins', AdminController::class);

    #Instructor CRUD
    Route::resource('instructors', InstructorController::class);

    #User CRUD
    Route::resource('users', UserController::class);

    #Category CRUD
    Route::resource('categories', CategoryController::class);

    #Courses CRUD
    Route::resource('courses', CoursesController::class);

    #Role
    Route::resource('roles', RoleController::class);

    #logout
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});


//---------------------------- frontend --------------------------------//

Route::group([
    'middleware' => 'web'
], function () {

    Route::get('/', function () {
        return view('frontend.home');
    })->name('frontend.home');

    #Login
    Route::get('login', [UserLoginController::class, 'index'])->name('user.get.login');
    Route::post('login', [UserLoginController::class, 'login'])->name('user.login');


    #Register
    Route::get('register', [UserRegisterController::class, 'index'])->name('user.get.register');
    Route::post('register', [UserRegisterController::class, 'store'])->name('user.store');

    #Email Verification
    Route::prefix('email/verify')->group(function() {
        Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
        Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    });
    
    #forgot-password
    Route::get('forgot-password', [UserForgotPasswordController::class, 'getForgotForm'])->name('user.getForgot');
    Route::post('forgot-password', [UserForgotPasswordController::class, 'sendResetLink'])->name('user.sendResetLink');

    #reset-password
    Route::get('reset-password', [UserResetPasswordController::class, 'resetVerify'])->name('user.resetVerily');
    Route::post('reset-password', [UserResetPasswordController::class, 'reset'])->name('user.resetPassword');

});

Route::group([
    'middleware' => 'auth'
], function ()  {

    #logout
    Route::get('logout', [UserLoginController::class, 'logout'])->name('user.logout');

});
