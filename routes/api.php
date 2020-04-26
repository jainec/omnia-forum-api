<?php

use App\Http\Controllers\LikeController;
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

Route::apiResource('questions', 'QuestionController');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('question/{question}/reply', 'ReplyController');
Route::post('reply/{reply}/like', 'LikeController@likeIt');
Route::delete('unlike/{like}', 'LikeController@unlikeIt');
// Route::apiResource('users', 'UserController');