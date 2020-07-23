<?php

use Illuminate\Support\Facades\Route;
use App\CustomPermision\Models\Role;
use App\User;
use App\Product;
use App\Detail;


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
Route::get('/verifyemail', function () {
    return view('index');
});
Route::get('/verifyemail/{user}', function () {
    return view('index');
});

/*Route::get('/home', function () {
    return view('index');
});*/

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/test', function () {

	$product = Product::find(1);
	$path = app_path();

   return view('test',['product' => $product, 'path' => $path]);
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('user-id', 'SessionController@userLogued');

/*Route::get('/home', 'HomeController@index')->name('home');*/
/*Route::get('/', 'HomeController@showcase')->name('showcase');*/
