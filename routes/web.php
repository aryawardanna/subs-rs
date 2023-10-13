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
Route::get('/', 'HomeController@index')->name('home');



Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['middleware' => ['auth']], function () {



    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('/dashboard/trash', 'DashboardTrashController@index')
        ->name('dashboard-trash');
    Route::get('/dashboard/trash/create', 'DashboardTrashController@create')
        ->name('dashboard-trash-create');
    Route::post('/dashboard/trash', 'DashboardTrashController@store')
        ->name('dashboard-trash-store');
    Route::get('/dashboard/trash/{id}', 'DashboardTrashController@details')
        ->name('dashboard-trash-details');
    Route::post('/dashboard/trash/{id}', 'DashboardTrashController@update')
        ->name('dashboard-trash-update');

    Route::post('/dashboard/trash/gallery/upload', 'DashboardTrashController@uploadGallery')
        ->name('dashboard-trash-gallery-upload');
    Route::get('/dashboard/trash/gallery/delete/{id}', 'DashboardTrashController@deleteGallery')
        ->name('dashboard-trash-gallery-delete');


    Route::post('/dashboard/update/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-settings-redirect');

});

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function() {
        Route::get('/', 'AdmDashboardController@index')->name('admin-dashboard');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });

Auth::routes();

