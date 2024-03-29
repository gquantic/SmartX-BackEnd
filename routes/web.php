<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controller\Admin\FinancesController;
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
        'products-admin' => \App\Http\Controllers\Admin\ProductsController::class,
        'files' => \App\Http\Controllers\Admin\FilesController::class,
        'finances-admin' => \App\Http\Controllers\Admin\FinancesController::class,
    ]);

    Route::get('/profit/create/{id}', 'App\Http\Controllers\Admin\ProfitController@create')->name('profit-create');
    Route::post('/profit', 'App\Http\Controllers\Admin\ProfitController@store')->name('profit-store');



});

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::view('/my', 'profile.my')->name('profile');

    Route::get('/referrals', function () {
        return view('profile.referrals', ['referrals' => \App\Models\User::find(Auth::id())->referrals]);
    })->name('referrals');

    Route::view('/profit/create', 'admin.createprofit')->name('create-profit');
    Route::get('/finances', 'App\Http\Controllers\FinanceController@index')->name('finances');
    Route::post('/finances', 'App\Http\Controllers\FinanceController@post')->name('finances-send');
    Route::post('/deposit', 'App\Http\Controllers\FinanceController@addDeposit')->name('add-deposit');

    Route::get('/invest/{id}', 'App\Http\Controllers\InvestController@showInvest')->name('invest');
    Route::post('/invest/{id}', 'App\Http\Controllers\InvestController@makeInvest')->name('make-invest');

    Route::resources([
        '/products' => \App\Http\Controllers\ProductsController::class,
        '/invests' => \App\Http\Controllers\PartController::class,
    ]);

    Route::get('/parts/products', [\App\Http\Controllers\PartController::class, 'products'])->name('parts.products');
});

Route::get('/register/{id}', [\App\Http\Controllers\Auth\RegisterController::class, 'referralSet']);

