<?php

Route::get('articles/article/{product}', [App\Http\Controllers\ProductsController::class, 'articles'])->name('articles.articles.user');
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::get('articles/article/{product}', [App\Http\Controllers\ProductsController::class, 'articles'])->name('articles.articles.user');
Route::get('categories/category/{category}', [App\Http\Controllers\HomeController::class, 'products'])->name('articles.category.user');

Route::group(['middleware' => 'admin'], function () {
	Route::resource('dashboard/articles', App\Http\Controllers\ProductsController::class);
	Route::get('dashboard/articles/edit/{product}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('edit.article');
	Route::post('dashboard/articles/update/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update.article');
	Route::get('dashboard/articles/delete/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('destroy.article');

	Route::resource('dashboard/categories', App\Http\Controllers\CategoriesController::class);
	Route::get('dashboard/categories/edit/{category}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('edit.category');
	Route::get('dashboard/categories/delete/{category}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('destroy.category');
	Route::post('dashboard/categories/update/{category}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('update.category');
	Route::get('dashboard/categories/category/{category}', [App\Http\Controllers\CategoriesController::class, 'products'])->name('products.category');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
});

