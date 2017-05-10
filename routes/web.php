<?php

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

define("GUID_REGEXP_PATTERN", '^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$');

Route::group(['as' => 'User'], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::group(['as' => 'LoginLogout'], function () {

        /**
         * 'as' => 'GetLoginPage'
         */
        Route::get('/login', function () {

            // Closure if not guest than to home

            return view('login');
        });

        Route::post('/login', ['as' => 'PostLoginingAction', 'uses' => 'Auth\LoginController@login']);

        Route::post('/logout', ['as' => 'PostLogoutingAction', 'uses' => 'Auth\LoginController@logout']);

    });

    Route::group(['as' => 'MainNSettings'], function () {

        Route::get('/user/{userGUID}', ['as' => 'GetUserPage', 'uses' => 'UserController@home'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/stats', ['as' => 'GetUserStatPage', 'uses' => 'UserController@stats'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/settings', ['as' => 'GetUserSettings', 'uses' => 'UserController@settings'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

        Route::post('/user/{userGUID}/settings/save', ['as' => 'PostSettingsSaveingAction', 'uses' => 'UserController@saveSettings'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

    });

    Route::group(['as' => 'UserDataBase'], function () {

        Route::get('/user/{userGUID}/databases', ['as' => 'GetDataBases', 'uses' => 'DataBaseController@all'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

        /**
         * 'as' => 'GetDBCreationPage'
         */
        Route::get('/user/{userGUID}/databases/create', function () {

            // Closure if not guest than to page

            return view('db/create');
        })->where('userGUID', GUID_REGEXP_PATTERN);

        Route::post('/user/{userGUID}/databases/create', ['as' => 'CreateDatabaseAction', 'uses' => 'DataBaseController@create'])
            ->where('userGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/databases/{dbGUID}', ['as' => 'GetDataBase', 'uses' => 'DataBaseController@getSingle'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/databases/{dbGUID}/manage', ['as' => 'ManageDataBase', 'uses' => 'DataBaseController@editSingle'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

        Route::post('/user/{userGUID}/databases/{dbGUID}/manage/save', ['as' => 'ManageDataBaseAction', 'uses' => 'DataBaseController@editSingleSave'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

    });

    Route::group(['as' => 'DataBaseTables'], function () {


        Route::get('/user/{userGUID}/databases/{dbGUID}/tables', ['as' => 'GetDataTables', 'uses' => 'DataBaseController@getAllTables'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/databases/{dbGUID}/tables/{tGUID}', ['as' => 'GetDataTable', 'uses' => 'DataBaseController@getSingleTable'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN)
            ->where('tGUID', GUID_REGEXP_PATTERN);

        Route::get('/user/{userGUID}/databases/{dbGUID}/tables/{tGUID}/manage', ['as' => 'ManageDataTable', 'uses' => 'DataBaseController@editSingleTable'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN)
            ->where('tGUID', GUID_REGEXP_PATTERN);

        Route::post('/user/{userGUID}/databases/{dbGUID}/tables/{tGUID}/manage/save', ['as' => 'ManageDataTableAction', 'uses' => 'DataBaseController@editSingleTableSave'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN)
            ->where('tGUID', GUID_REGEXP_PATTERN);

    });

    Route::group(['as' => 'CacheEnvironment'], function () {

        Route::get('/user/{userGUID}/databases/{dbGUID}/cache', ['as' => 'CacheEnvironment', 'uses' => 'CacheEnvironment@getDBSettings'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

        Route::post('/user/{userGUID}/databases/{dbGUID}/cache', ['as' => 'CacheEnvironmentSaveAction', 'uses' => 'CacheEnvironment@editDBSettings'])
            ->where('userGUID', GUID_REGEXP_PATTERN)
            ->where('dbGUID', GUID_REGEXP_PATTERN);

    });

});

Route::group(['as' => 'Admin'], function () {

    Route::get('admin/login', ['as' => 'AdminLogin', 'uses' => 'AdminController@login']);
    Route::post('admin/login', ['as' => 'AdminLogout', 'uses' => 'AdminController@logout']);

    Route::get('admin/customers', ['as' => 'GetCustomers', 'uses' => 'AdminController@getCustomers']);
    Route::post('admin/customers', ['as' => 'GetCustomersAction', 'uses' => 'AdminController@saveCustomers']);

    Route::get('admin/customers/{customerGUID}', ['as' => 'GetSingleCustomer', 'uses' => 'AdminController@getCustomer'])
        ->where('customerGUID', GUID_REGEXP_PATTERN);
    Route::post('admin/customers/{customerGUID}', ['as' => 'GetSingleCustomerAction', 'uses' => 'AdminController@saveCustomer'])
        ->where('customerGUID', GUID_REGEXP_PATTERN);

    Route::get('admin/customers/{customerGUID}/databases', ['as' => 'GetSingleCustomerDBs', 'uses' => 'AdminController@getAllDB'])
        ->where('customerGUID', GUID_REGEXP_PATTERN);
    Route::post('admin/customers/{customerGUID}/databases', ['as' => 'GetSingleCustomerDBsAction', 'uses' => 'AdminController@saveAllDB'])
        ->where('customerGUID', GUID_REGEXP_PATTERN);

    Route::get('admin/customers/{customerGUID}/databases/{dbGUID}', ['as' => 'GetSingleCustomerDB', 'uses' => 'AdminController@getDB'])
        ->where('customerGUID', GUID_REGEXP_PATTERN)
        ->where('dbGUID', GUID_REGEXP_PATTERN);
    Route::post('admin/customers/{customerGUID}/databases/{dbGUID}', ['as' => 'GetSingleCustomerDBAction', 'uses' => 'AdminController@saveDB'])
        ->where('customerGUID', GUID_REGEXP_PATTERN)
        ->where('dbGUID', GUID_REGEXP_PATTERN);

});
