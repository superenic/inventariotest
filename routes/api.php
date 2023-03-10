<?php

use App\Http\Controllers\api\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/producto', ProductosController::class);
Route::put('/producto/cambiarCantidad/{producto}', [ProductosController::class,'cambiarCantidad'])->name('producto.actualizarCantidad');
Route::put('/producto/{producto}', [ProductosController::class, 'putCalificacion'])->name('put.calificacion');