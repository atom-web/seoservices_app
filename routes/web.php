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
    // $tables = DB::select('SHOW TABLES');
    // foreach ($tables as $table) {
    //     foreach ($table as $key => $value)
    //         echo $value;
    // }
    return view('welcome');
});
