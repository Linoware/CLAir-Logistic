<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'jwt.auth'], function ($router) {

    Route::get('/', 'UsersController@index');

    Route::get('customers', 'CustomersController@all');
    Route::get('customers/{id}', 'CustomersController@get');
    Route::post('customers/new', 'CustomersController@new');

    Route::resource('roles','RolesController');

    Route::resource('users','UsersController');
    Route::post('users/multiple_delete','UsersController@multipleDelete');

    Route::resource('roles','RolesController');
    Route::post('roles/multiple_delete','RolesController@multipleDelete');

    Route::resource('countries','CountriesController');
    Route::post('countries/filters','CountriesController@countryFilter');
    Route::post('countries/multiple_delete', 'CountriesController@multipleDelete');


    Route::post('provinces/filters','ProvincesController@provinceFilter');
    Route::get('provinces/get_countries','ProvincesController@getCountries');
    Route::resource('provinces','ProvincesController');

    Route::resource('cities','CitiesController');

    Route::resource('products','ProductsController');

});

Route::resource('country','AvailableCountriesController');
Route::resource('province','AvailableProvincesController');
Route::resource('city','AvailableCitiesController');

Route::resource('freight','FreightController');
