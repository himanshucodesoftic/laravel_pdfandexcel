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

Route::get('/', function () {
    return view('welcome');
});

Route::get('new',"App\Http\Controllers\pdf@gen");

//dynamic pdf

Route::get('/dynamic_pdf', 'App\Http\Controllers\pdf@index');

Route::get('/dynamic_pdf/pdf', 'App\Http\Controllers\pdf@pdf');


//dynamic excel




// Route::get('/import_excel', 'App\Http\Controllers\ImportExcelController@index');
// Route::post('/import_excel/import', 'App\Http\Controllers\ImportExcelController@import');


Route::get('export', 'App\Http\Controllers\MyController@export')->name('export');
Route::get('importExportView', 'App\Http\Controllers\MyController@importExportView');
Route::post('import', 'App\Http\Controllers\MyController@import')->name('import');
Route::view('import_suceesful','import_suceesful');