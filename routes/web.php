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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('dashboard.auth-pages.login');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Auth::routes();
Route::group(['middleware' => ['superadmin','auth']], function() {
Route::get('/admins', 'AdminController@index')->name('admin.index');
Route::post('user-store', 'AdminController@store')->name('admin.store');
Route::get('user-edit/{id}', 'AdminController@edit');
Route::post('user-update', 'AdminController@update')->name('admin.update');
Route::get('user-delete/{id}', 'AdminController@SoftDelete')->name('admin.delete');
Route::get('user-status/{id}', 'AdminController@ActiveDe')->name('admin.status');
Route::get('customer-delete/{id}', 'CustomerController@SoftDelete')->name('customer.delete');
});

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile-update', 'ProfileController@update')->name('update');
    Route::post('/profile-password-update', 'ProfileController@ProfilePasswordUpdate')->name('password.update');


    Route::get('/pendding-customers', 'CustomerController@PenddingCustomers')->name('customer.pendding');
    Route::get('/pendding-customers-accept-{id}', 'CustomerController@AcceptCustomers')->name('customer.accept');
    Route::get('/customers', 'CustomerController@index')->name('customer.index');
    Route::post('customer-store', 'CustomerController@store')->name('customer.store');
    Route::get('customer-edit/{id}', 'CustomerController@edit');
    Route::post('customer-update', 'CustomerController@update')->name('customer.update');
    
    Route::get('/create-invoice', 'InvoiceController@create_invoice')->name('invoice.create');
    Route::get('/invoices', 'InvoiceController@index')->name('invoice.index');
    Route::post('invoice-store', 'InvoiceController@store')->name('invoice.store');
    Route::get('invoice-edit/{id}', 'InvoiceController@edit')->name('invoice.edit');
    Route::post('invoice-update', 'InvoiceController@update')->name('invoice.update');
    Route::get('invoice-delete/{id}', 'InvoiceController@SoftDelete')->name('invoice.delete');
    Route::get('invoice-print/{id}', 'InvoiceController@printinvoice')->name('invoice.print');
    

});


