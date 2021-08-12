<?php

use App\Http\Controllers\CommentController;
use App\Product;
use App\Http\Controllers\ProductController;
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
    return view('index');
});
Route::get('/', [ProductController::class, 'show']);

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');
Route::post('/admin', [ProductController::class, 'store'])->middleware('admin');

Route::get('/detail/{prod}', function ($id) {
    return view('detail', [
        'product' => Product::findOrFail($id)
    ]);
});
Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/remove-from-cart/{id}', [
    'uses' => 'ProductController@getRemoveFromCart',
    'as' => 'product.removeFromCart'
]);

Route::get('/remove-all-from-cart/{id}', [
    'uses' => 'ProductController@getRemoveAllFromCart',
    'as' => 'product.removeAllFromCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);


Route::get('/signin', [
    'uses' => 'UserController@getSignin',
    'as' => 'user.signin',
    'middleware' => 'guest'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin',
    'middleware' => 'guest'
]);

Route::get('/user/profile', [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile',
    'middleware' => 'auth'
]);
Route::get('user/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout',
    'middleware' => 'auth'
]);

Route::post('/detail/{prod}/comments', [CommentController::class, 'store'])->middleware('auth');
