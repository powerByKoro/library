<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::post('/account/add/{id}', [BasketController::class, 'add'])->name('account.add');
//Route::get('/basket', 'App\Http\Controllers\BasketController@index')->name('basket.index');

Route::get('/account', [HomeController::class, 'index'])->name('account');
Auth::routes();
//Route::get('/', 'App\Http\Controllers\RouteController@home')->name('home');



//Route::get('/catalog/index', 'CatalogController@index')->name('catalog.index');
//Route::get('category/{slug}', 'App\Http\Controllers\CatalogController@category')->name('catalog.category');
//Route::get('author/{slug}', 'App\Http\Controllers\CatalogController@brand')->name('catalog.brand');
//Route::get('product/{slug}', 'App\Http\Controllers\CatalogController@product')->name('product');

