<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\HomeProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//////////// test roots//////////////////
Route::get('multi-file-ajax-upload', [ProductsController::class, 'uploadimg']);
Route::post('store-multi-file-ajax', [ProductsController::class, 'storeMultiFile']);
Route::get('file-upload', [ProductsController::class, 'file_upload']);
Route::post('store-file', [ProductsController::class, 'store_file']);
//////////////// end of test roots//////////////



//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::view('/Home', 'home1');
//
//Auth::routes();

////////Social Pages ///////////
Route::get('/', 'WebHomeController@index')->name('web');
Route::get('add-to-cart/{id}', [HomeProductController::class, 'addToCart'])->name('add.to.cart');
route::get('productDetails/{id}','WebHomeController@productDetails');
//////// end of social pages ////////


Route::redirect('/login', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');
    route::get('categoryDetails/{id}','CategoryController@categoryDetails');


    // SubCategory
    Route::delete('sub_categories/destroy', 'SubCategoryController@massDestroy')->name('sub_categories.massDestroy');
    Route::resource('sub_categories', 'SubCategoryController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Countries
//    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
      Route::resource('countries', 'CountryController');

      //States
      Route::resource('states','StatesController');

    // Cities
//    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
      Route::resource('cities', 'CitiesController');

      //regions
      Route::resource('regions','RegionController');
    route::get('locationDetails/{id}','RegionController@locationDetails');

      //Companies
      Route::resource('companies','CompaniesController');

      //Banks
    Route::resource('banks','BankController');

    //Products
    Route::resource('products','ProductsController');

    //Units
    Route::resource('units','UnitsController');

    // Trips
//    Route::delete('trips/destroy', 'TripsController@massDestroy')->name('trips.massDestroy');
//    Route::resource('trips', 'TripsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
