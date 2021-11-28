<?php

use App\Http\Controllers\Members\AccountController;
use App\Http\Controllers\Members\DashboardController;
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
    return view('homepage');
});

Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::get('/account', [AccountController::class, 'index'])->name('members.account');
Route::post('/account', [AccountController::class, 'updateDetails'])->name('members.updatedetails');
Route::put('/account', [AccountController::class, 'updatePassword'])->name('members.updatepassword');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('members.dashboard');
