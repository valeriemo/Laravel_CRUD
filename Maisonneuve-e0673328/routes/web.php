<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/etudiant-reseau', [EtudiantController::class, 'index'])->name('etudiant.index'); // Route pour afficher tous les étudiants

// Méthode pour afficher la page d'un blog en particulier
Route::get('/etudiant-reseau/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

// Méthode pour afficher la page de création
Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');

// Méthode pour store un nouveau blog
Route::post('/etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');

// Méthode pour afficher la page de modification
Route::get('/etudiant-reseau/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');

// // Méthode pour store le update
// Route::put( '/reseau/edit/{reseauPost}', [EtudiantController::class, 'update'])->name('etudiant.edit');
// // Méthode pour supprimer un article
// Route::delete('/reseau/{reseauPost}', [EtudiantController::class, 'destroy'])->name('reseau.delete');