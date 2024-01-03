<?php

use App\Http\Controllers\GestionController;
use App\Http\Controllers\VotacionController;

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

Route::get('/', [VotacionController::class , 'index'])->name('welcome');







// Route::put('/dashboard/udpate/{id}', [GestionController::class, 'udpate'])->name('dashboard.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/votar' , [VotacionController::class, 'vote'])->name('votar');



Route::resource('dashboard', GestionController::class)->only([
    'index', 'create', 'store' , 'show' , 'edit', 'update','destroy' ,
    ])->middleware('can:dashboard');
Route::post('/dashboard/storage', [GestionController::class, 'store'])->name('storage');
