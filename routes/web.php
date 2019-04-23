<?php

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
Route::get('/', function(){
	return view('auth.login');
});

Auth::routes();

Route::match(["GET","POST"], "/register", function(){
	return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');

//MANAGE USER
Route::resource("users", "UserController");
Route::get('/users/create', 'UserController@create')->name('users.create');

//MANAGE CATEGORY
Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::delete('/categories/{id}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
Route::resource('/categories', 'CategoryController');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');

//MANAGE BOOK
Route::get('/books/trash','BookController@trash')->name('books.trash');
Route::resource('books', 'BookController');


