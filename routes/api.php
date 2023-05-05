<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InjuryHistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
Route::apiResource('stats', StatsController::class);
Route::get('/stats/player/{playerId}', [StatsController::class, 'playerStats']);
Route::apiResource('injury', InjuryHistoryController::class);
Route::get('/injury/player/{playerId}', [InjuryHistoryController::class, 'playerInjuryHistory']);
Route::apiResource('chat', ChatController::class);
Route::apiResource('ratings', RatingController::class);
Route::apiResource('reply', ReplyController::class);
Route::apiResource('clubs',ClubController::class);
Route::get('/clubs/player/{playerId}', [ClubController::class, 'playerClubHistory']);
Route::apiResource('posts',PostController::class);
Route::apiResource('comments',CommentController::class);
