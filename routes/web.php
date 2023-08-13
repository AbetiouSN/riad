<?php

use App\Http\Controllers\ProduitController;
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

route::get('/ajouter_produit',[ProduitController::class,'ajouter_produit'])->name('ajouter');
Route::post('/store_produit',[ProduitController::class,'add_Produit'])->name('store_produit');

//route pour affiche un  formulaire contient les infos d'un produit
Route::get('/show_produit_add/{id}',[ProduitController::class ,'show_produit_add'])->name('show_produit_add');
// update add
Route::put('/update_produite/{id}',[ProduitController::class , 'Add_quantite'])->name('update_produite');

////route pour affiche un  formulaire contient les infos d'un produit
Route::get('/show_produit_sup/{id}',[ProduitController::class, 'show_produit_sup'])->name('show_produit_sup');
Route::put('/update_produit_sup/{id}',[ProduitController::class,'Sup_quantite'])->name('update_produit_sup');



//affichage 

Route::get('/affichage_produits',[ProduitController::class,'show_produits'])->name('affichage_produits')->middleware('auth');


Route::post('/entre', [ProduitController::class, 'showentreForDate'])->name('entre')->middleware('web');
Route::post('/sorte', [ProduitController::class, 'showsortieForDate'])->name('sorte')->middleware('web');
Route::post('/historique', [ProduitController::class, 'showHistoriqueForDate'])->name('historique')->middleware('web');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
