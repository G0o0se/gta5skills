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

Route::get('/locale/{locale}', function ( $lang ) {
    Session::put('locale', $lang);

    return redirect()->back();
})->name('locale');

Route::prefix('auth')->group(function () {
    Route::get('/{provider}', 'AuthController@login')->name('login');
    Route::get('/callback/{provider}', 'AuthController@callback');
});

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware([ 'language' ])->group(function () {
    Route::get('/', 'SiteController@index')->name('index');

    Route::get('/faq', 'SiteController@faq')->name('faq');

    Route::get('/warranty', 'SiteController@warranty')->name('warranty');

    Route::get('/agreement', 'SiteController@agreement')->name('agreement');

    Route::get('/reviews', 'SiteController@reviews')->name('reviews');

    Route::get('/packages/{url}', 'SiteController@packages')->name('packages.show');
    Route::post('/order/packages/{url}', 'SiteController@orderPackages')->name('packages.order');


    Route::middleware([ 'auth' ])->group(function () {
        Route::get('/profile', 'SiteController@profile')->name('profile');

        Route::post('/profile/promocode', 'SiteController@profileUsePromocode')->name('profile.use_promocode');
    });


});


// ADMIN PANEL
Route::middleware([ 'auth', 'admin.authenticate' ])->prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::resource('packages', 'Admin\PackageController')->except([
        'show', 'destroy'
    ]);

    Route::get('/packages/{id}/delete', 'Admin\PackageController@delete')->name('packages.delete');

    Route::resource('orders', 'Admin\OrderController')->except([
        'create', 'store', 'show', 'edit', 'destroy'
    ]);

    Route::resource('refills', 'Admin\RefillController')->except([
        'create', 'store', 'show', 'edit', 'destroy'
    ]);

    Route::resource('promocodes', 'Admin\PromocodeController')->except([
        'show', 'destroy'
    ]);

    Route::resource('users', 'Admin\UsersController')->except([
        'show', 'destroy'
    ]);


    Route::get('/promocodes/{id}/delete', 'Admin\PromocodeController@delete')->name('promocodes.delete');
});
