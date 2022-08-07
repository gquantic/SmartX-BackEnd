<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('/admin')->middleware('auth')->middleware('admin')->group(function () {
    Route::redirect('/', 'users/')->name('home');

    Route::resources([
        'users' => \App\Http\Controllers\Admin\UsersController::class,
        'products-admin' => \App\Http\Controllers\ProductsController::class,
    ]);
});

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::view('/my', 'profile.index')->name('profile');

    Route::get('/referrals', function () {
        return view('profile.referrals', ['referrals' => \App\Models\User::find(Auth::id())->referrals]);
    })->name('referrals');

    Route::view('/finances', 'profile.index')->name('finances');

    Route::get('/invest/{id}', 'App\Http\Controllers\InvestController@showInvest')->name('invest');
    Route::post('/invest/{id}', 'App\Http\Controllers\InvestController@makeInvest')->name('make-invest');

    Route::resources([
        '/products' => \App\Http\Controllers\ProductsController::class,
        '/invests' => \App\Http\Controllers\PartController::class,
    ]);

    Route::get('/parts/products', [\App\Http\Controllers\PartController::class, 'products'])->name('parts.products');
});

Route::get('/register/{id}', [\App\Http\Controllers\Auth\RegisterController::class, 'referralSet']);
