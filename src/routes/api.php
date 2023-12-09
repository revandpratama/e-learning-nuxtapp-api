<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TuitionController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    // Route::get('/krs', [KrsController::class, 'index']);
    Route::get('/krs', [KrsController::class, 'userKrs']);
    Route::get('/score', [ScoreController::class, 'userScore']);
    Route::get('/tuition', [TuitionController::class, 'userTuition']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});

Route::group(['middleware' => 'guest'], function() {

    
    Route::prefix('/auth')->group(function() {
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->name('login');   

        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->name('register');
});

});


Route::get('/me', function() {
    return response()->json(
        'asd',200
    );
});

