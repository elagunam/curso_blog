<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TemaController;
use App\Http\Livewire\Usuarios;
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


Route::prefix('/temas')->middleware('auth')->group(function(){
    Route::get('/', [TemaController::class, 'index'])->name('temas');
    Route::post('/', [TemaController::class, 'create'])->name('temas');
    Route::get('/delete/{id}', [TemaController::class, 'delete'])->name('deleteTema');
    Route::get('/editar/{id}', [TemaController::class, 'editar'])->name('editarTema');
});

Route::prefix('/posts')->middleware('auth')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::post('/', [PostController::class, 'create'])->name('posts');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('deletePost');
    Route::get('/editar/{id}', [PostController::class, 'editar'])->name('editarPost');
});

Route::get('/usuarios', Usuarios::class);


