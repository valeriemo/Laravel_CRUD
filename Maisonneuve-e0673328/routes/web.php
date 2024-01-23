<?php
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\FileController;
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

// Page d'accueil du site
Route::get('/', function () {
    return view('reseau.welcome');
})->name('accueil');

// // Méthode pour afficher la page de détail d'un étudiant
// Route::get('/etudiant-reseau/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

// // Méthode pour afficher la page de création d'un nouvel étudiant
// Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');

// // Méthode pour store le nouvel étudiant
// Route::post('/etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');

// // Méthode pour afficher la page de modification
// Route::get('/etudiant-reseau/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');;

// // // Méthode pour store le update
// Route::put( '/etudiant-reseau/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.edit')->middleware('auth');

// // // Méthode pour supprimer un étudiant
// Route::delete('/etudiant-reseau/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete')->middleware('auth');

// // Méthode pour afficher la page de creation d'un compte étudiant
Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'store'])->name('registration');

// // Méthode pour afficher la page de login
Route::get('/login',  [CustomAuthController::class, 'index'])->name('login'); //la page login doit toujours s'appeller login
Route::post('/authentication',  [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('/logout',[CustomAuthController::class, 'logout'])->name('logout');

// Route pour les Blogs
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog-create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('/blog/edit', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');

// Route pour les files
Route::get('/file-show', [FileController::class, 'index'])->name('file.index')->middleware('auth');
// Ajouter un fichier
Route::get('/add-file', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('/add-file', [FileController::class, 'store'])->name('file.store')->middleware('auth');
// Editer un fichier
Route::get('/file-edit/{file}', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('/file-edit', [FileController::class, 'update'])->name('file.store')->middleware('auth');
// Supprimer un fichier
Route::delete('/file/{file}', [FileController::class, 'destroy'])->name('file.delete')->middleware('auth');

// Route pour la langue
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


