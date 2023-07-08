<?php

use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/about', function(){
//     $nombre = 'Eleazar Laguna';
//     return view('estaticas.about', ['nombre' => $nombre]);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/temas', [TemaController::class, 'index'])->name('temas');
Route::post('/temas', [TemaController::class, 'create'])->name('temas');

Route::get('/temas/delete/{id}', [TemaController::class, 'delete'])->name('deleteTema');
Route::get('/temas/editar/{id}', [TemaController::class, 'editar'])->name('editarTema');
