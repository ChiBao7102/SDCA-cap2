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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'App\Http\Controllers\DashbardController@index')->name('dashboard');
});
//Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/dashboard/tenant', 'App\Http\Controllers\DashbardController@listTenant')->name('adminTenant');
});
//Tenant
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::group(['prefix' => '/car'], function () {
        Route::get('/', 'App\Http\Controllers\CarController@showList')->name('show.list');
        Route::get('delete/{id}', 'App\Http\Controllers\CarController@destroy')->name('car.destroy');
        Route::post('/createcar', 'App\Http\Controllers\CarController@store')->name('car.create');
        Route::get('/showcar/{id}', 'App\Http\Controllers\CarController@showCar')->name('car.show');
        Route::post('/update/{id}', 'App\Http\Controllers\CarController@update')->name('car.update');
        Route::post('/updateImg/{id}', 'App\Http\Controllers\CarController@updateImg')->name('car.update.img');
    });
    Route::group(['prefix'=>'/transaction'],function(){
        Route::get('/','App\Http\Controllers\TransactionController@index')->name('transaction.index');
        Route::get('/show/{id}','App\Http\Controllers\TransactionController@show')->name('transaction.show');
    });
});
Route::group(['prefix' => '/welcome'], function () {

    Route::get('/', 'App\Http\Controllers\HomepageController@showCar')->name('list.car');
    Route::get('/detail/{id}','App\Http\Controllers\HomepageController@detail')->name('detail-car');
    Route::post('/create','App\Http\Controllers\TransactionController@store')->name('transaction.create');
});
require __DIR__ . '/auth.php';
