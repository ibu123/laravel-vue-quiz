<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
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
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::get('topic/quiz', [QuizController::class, 'quizByTopic'])->name('topics.quiz');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('quiz', function(Request $request){
        return view('quiz');
    })->name('attend-quiz');
    Route::get('topic', [ QuizController::class, 'topics']);

    Route::get('quiz/{any}', function(Request $request){
        return view('quiz');
    })->name('view-question');
});
