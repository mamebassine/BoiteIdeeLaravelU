<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\AdminController;

// Page d'accueil
Route::get('/', [AccueilController::class, 'index'])->name('accueil');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

// Dashboard Admin (après login)
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

// CATEGORIES
Route::resource('categories', CategorieController::class);

// IDEES general

// idee admi
Route::get('/ideesafficheAdmin', [IdeeController::class, 'afficheAdmin'])
    ->name('idees.afficheAdmin');

// Page pour modifier le statut d'une idée (admin)
Route::get('idees/{id}/modifier-admin', [IdeeController::class, 'modifierAdmin'])->name('idees.modifierAdmin');

// Mise à jour du statut
Route::put('/idees/{id}/statut', [IdeeController::class, 'updateStatut'])
    ->name('idees.updateStatut');





    
Route::get('/idees', [IdeeController::class, 'index'])->name('idees.index');
Route::get('/idees/creer', [IdeeController::class, 'create'])->name('idees.create');
Route::post('/idees', [IdeeController::class, 'store'])->name('idees.store');
Route::get('/idees/{idee}', [IdeeController::class, 'show'])->name('idees.show');
Route::get('/idees/{idee}/modifier', [IdeeController::class, 'edit'])->name('idees.edit');
Route::put('/idees/{idee}', [IdeeController::class, 'update'])->name('idees.update');
Route::delete('/idees/{idee}', [IdeeController::class, 'destroy'])->name('idees.destroy');

// COMMENTAIRES
Route::resource('commentaires', CommentaireController::class);

// Contact
// Afficher le formulaire de contact
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

// Traiter le formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Auth Breeze / Jetstream
require __DIR__.'/auth.php';
