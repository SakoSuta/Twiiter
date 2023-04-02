<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tweets', function () {
    return view('timeline');
})->middleware(['auth', 'verified'])->name('timeline');

Route::middleware('auth')->group(function () {
    Route::post('/tweets/create', [TimelineController::class, 'CreateTweet'])->name('create.tweets');
    Route::get('/users/{username}/tweets', [TimelineController::class, 'ShowTweets'])->name('tweets.users');
    Route::get('/delete/{id}', [TimelineController::class, 'DeleteTweets'])->name('delete.tweets');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
