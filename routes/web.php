<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VueController;
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

Route::get('/',[VueController::class,'index']);
Route::resource('/vue',VueController::class)->only([
    'index',
    'show',
    'create',
    'edit'
]);
// Route::resource('/productos',HomeController::class);
