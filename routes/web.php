<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// register
Route::get('register', [UserController::class,'Register'])->name('register');
Route::post('register', [UserController::class,'Registerstore']);


// login
Route::get('login', [UserController::class,'Login'])->name('login');
Route::post('login', [UserController::class,'Loginstore']);
Route::get('logout', [UserController::class,'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('generate-invoice', [UserController::class,'invoice']);
