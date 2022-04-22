<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
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
Route::get('/authors_page', [ImageController::class, 'authors_page'])->name('authors_page');
Route::get('/category_page', function(){
    return view('category_page');
});
Route::post('/author/{id}', [ImageController::class, 'authors'])->name('author');
Route::post('/category/{id}', [ImageController::class, 'categories'])->name('categories');
Route::post('/book_description/{id}', [ImageController::class, 'bookDescription'])->name('bookDescription');


Route::post('/image/upload/{id}', [ImageController::class, 'upload_img'])->name('upload_img');
Route::get('/search', [CatalogController::class, 'search'])->name('search');
Route::post('/books/add/{id}', [BookController::class, 'add'])->name('account.add');
Route::post('/books/delete/{id}', [BookController::class, 'delete'])->name('account.delete');


Route::get('/account', [HomeController::class, 'index'])->name('account');
Route::get('/author_books', function (){
    return view('author_books');
})->name('author_books');

Auth::routes();




