<?php

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

Auth::routes();

Route::redirect('/home', '/profile');

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::view('/', 'profile.index')->name('home');
    Route::view('/my', 'profile.index')->name('profile');
    Route::view('/products', 'profile.index')->name('products');
    Route::view('/invests', 'profile.index')->name('invests');
    Route::view('/referrals', 'profile.index')->name('referrals');
    Route::view('/finances', 'profile.index')->name('finances');
});

Route::get('/register/{id}', [\App\Http\Controllers\Auth\RegisterController::class, 'referralSet']);
