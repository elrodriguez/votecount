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
Route::middleware(['auth:sanctum', 'verified'])->prefix('votecount')->group(function () {
    Route::get('/', 'VoteCountController@index')->name('votecount_dashboard');

    Route::prefix('schools')->group(function () {
        Route::get('list', 'SchoolsController@index')->name('votecount_schools');
        Route::get('create', 'SchoolsController@create')->name('votecount_schools_create');
        Route::get('edit/{id}', 'SchoolsController@edit')->name('votecount_schools_edit');
        Route::get('classrooms/{id}', 'SchoolsController@classrooms')->name('votecount_schools_classrooms');
    });
    Route::prefix('tables')->group(function () {
        Route::get('list', 'TablesController@index')->name('votecount_tables');
        Route::get('create', 'TablesController@create')->name('votecount_tables_create');
        Route::get('edit/{id}', 'TablesController@edit')->name('votecount_tables_edit');
    });
});
