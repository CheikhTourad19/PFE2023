<?php

use App\Http\Controllers\ProfileController;
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

    $annonces = \App\Models\User::join('annonce as a', 'users.id', '=', 'a.idUser')->orderBy('a.created_at', 'asc')
        ->select('users.name', 'a.titre', 'a.description')->get();


    return view('welcome',compact('annonces'));
});

Route::get('/dashboard', function () {
    $userinfo = auth()->user();
    $publications = [];
    if ($userinfo) {
        $publications = \App\Models\annonce::where('idUser', $userinfo->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    return view('dashboard', compact('publications', 'userinfo'));

})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
