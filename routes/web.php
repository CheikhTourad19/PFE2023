<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {

    return view('welcome');
})->name('welcome');



Route::get('/dashboard', function () {
$user=auth()->user();
    return view('dashboard',['user' => $user]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/userannonce', function () {

    return view('userannonce');

})->middleware(['auth', 'verified'])->name('userannonce');

Route::get('/userfavoris', function () {

    return view('userfavoris');

})->middleware(['auth', 'verified'])->name('userfavoris');

require __DIR__.'/auth.php';
