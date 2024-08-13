<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::middleware(['auth', 'verified', 'user'])->group(function(){
    Route::get('dashboard', [userController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'index']);
    Route::get('admin/export', [AdminController::class, 'export']);
});


Route::middleware(['auth'])->group(function(){
    Route::get('book', [bookController::class, 'Book'])->name('book');
    Route::post('book', [bookController::class, 'create']);
    Route::get('book/{id}/edit', [bookController::class, 'edit'])->middleware('book.owner');
    Route::put('book/{id}/edit', [bookController::class, 'update']);
    Route::delete('book/{id}/delete', [bookController::class, 'delete'])->middleware('book.owner');


});
