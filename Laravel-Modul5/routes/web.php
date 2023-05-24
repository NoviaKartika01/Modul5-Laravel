<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route HomeController untuk halaman Home
Route::get('home', [HomeController::class, 'index'])->name('home');

// Route ProfileController untuk halaman My Profile
Route::get('profile', ProfileController::class)->name('profile');

// Route EmployeeController untuk halaman Employee
Route::resource('employees', EmployeeController::class);

