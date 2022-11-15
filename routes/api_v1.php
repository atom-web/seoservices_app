<?php

use App\Http\Controllers\v1\auth\AuthController;
use App\Http\Controllers\v1\auth\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\SearchController;
use App\Http\Controllers\v1\GetInfoServerController;

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

//Поиск совпадения в файлах /api/v1/search/
Route::get('search', [SearchController::class, 'search']);
Route::get('get-status-server', [GetInfoServerController::class, 'get_info']);

Route::post('registration', [RegistrationController::class, 'registration']);
Route::post('login', [AuthController::class, 'authorization']);
