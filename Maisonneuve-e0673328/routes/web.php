<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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

// Page d'accueil de Laravel
Route::get('/', function () {
    return view('welcome');
});
// Route pour afficher tous les étudiants
Route::get('/etudiant-reseau', [EtudiantController::class, 'index'])->name('etudiant.index'); // Route pour afficher tous les étudiants

// Méthode pour afficher la page de détail d'un étudiant
Route::get('/etudiant-reseau/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

// Méthode pour afficher la page de création d'un nouvel étudiant
Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');

// Méthode pour store le nouvel étudiant
Route::post('/etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');

// Méthode pour afficher la page de modification
Route::get('/etudiant-reseau/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');

// // Méthode pour store le update
Route::put( '/etudiant-reseau/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.edit');

// // Méthode pour supprimer un étudiant
Route::delete('/etudiant-reseau/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');

// // Méthode pour afficher la page de creation d'un compte étudiant
Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
