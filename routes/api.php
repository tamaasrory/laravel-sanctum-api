<?php

use App\Models\User;
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

Route::post('/tests', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    $token = $user->createToken('myapp')->plainTextToken;
    return [$user, $token];
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
