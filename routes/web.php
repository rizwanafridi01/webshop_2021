<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::view('/Home', 'home1');
//
//Auth::routes();

////////Social Pages ///////////
Route::get('/', 'WebHomeController@index')->name('web');
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

    // Roles
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

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
