<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('game', GameController::class);

/*la función de fallback es una forma de anular la
página 404 predeterminada e introducir una lógica adicional.
Así es como funciona , aqui devolvemos una resspuesta Json con http 404 */
Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact with admin'
    ], 404);
});