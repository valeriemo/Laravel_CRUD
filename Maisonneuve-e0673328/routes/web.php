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

// // Méthode pour afficher la page de creation d'un compte étudiant
Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'store'])->name('registration');
// User
Route::get('/user/{etudiant}', [EtudiantController::class, 'show'])->name('user.show');
Route::get('/user/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('user.edit');
Route::put('/user/edit', [EtudiantController::class, 'update'])->name('user.update');
Route::delete('/user/{etudiant}', [EtudiantController::class, 'destroy'])->name('user.delete');
// // Méthode pour afficher la page de login
Route::get('/login',  [CustomAuthController::class, 'index'])->name('login'); 
Route::post('/authentication',  [CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('/logout',[CustomAuthController::class, 'logout'])->name('logout');
// Route pour les Blogs
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog-create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('/blog/edit', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.delete')->middleware('auth');
// Route pour les files
Route::get('/file-show', [FileController::class, 'index'])->name('file.index')->middleware('auth');
Route::get('/add-file', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('/add-file', [FileController::class, 'store'])->name('file.store')->middleware('auth');
Route::get('/file-edit/{file}', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('/file-edit', [FileController::class, 'update'])->name('file.update')->middleware('auth');
// Supprimer un fichier
Route::delete('/file/{file}', [FileController::class, 'destroy'])->name('file.delete')->middleware('auth');
// Route pour la langue
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


