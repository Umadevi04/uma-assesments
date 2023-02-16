<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('webadmin.login');
});

// Auth::routes();

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
//     Route::resource('permissions', PermissionController::class);
// });

Route::group(['prefix' => 'webadmin'], function () {

    Route::name('webadmin.')->group(function () {
        Auth::routes();
        Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class,'register'])->name('create');

        Route::middleware('auth')->group(function () {
             Route::get('logout', [LoginController::class,'logout'])->name('logout');

             Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

            // Resources
            // Route::resource('users','UserController');
            // Route::get('/users', 'UserController@index')->name('users.index');
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            Route::resource('permissions', PermissionController::class);
        });
    });
});
