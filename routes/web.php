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

Route::get('/test', function () {

	$product = Product::find(1);

   return view('test',['product' => $product]);
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('/', 'HomeController@showcase')->name('showcase');*/
