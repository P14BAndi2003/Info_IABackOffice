<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', \App\Http\Controllers\AuteurController::class . '@logAuteur');
Route::post('/traiterlogAuteur', \App\Http\Controllers\AuteurController::class . '@login');
Route::get('/logoutAuteur', \App\Http\Controllers\AuteurController::class . '@logout');
Route::post('/ajouterArticle', \App\Http\Controllers\ArticleController::class . '@store');
Route::get('/toAjout', \App\Http\Controllers\ArticleController::class . '@toAjout');
Route::get('/listeparAuteur', \App\Http\Controllers\ArticleController::class . '@listeparAuteur');
Route::get('/modifierArticle/{id}', \App\Http\Controllers\ArticleController::class . '@modifierArticle')->name('articles.modifierArticle');
Route::post('/confirmerModifier', \App\Http\Controllers\ArticleController::class . '@confirmerModifier');
Route::get('/logAdmin', \App\Http\Controllers\AdminController::class . '@logAdmin');
Route::post('/traiterlogAdmin', \App\Http\Controllers\AdminController::class . '@login');
Route::get('/logoutAdmin', \App\Http\Controllers\AdminController::class . '@logout');
Route::get('/liste', \App\Http\Controllers\ArticleController::class . '@liste')->name('articles.liste');
Route::get('/validerArticle/{id}', \App\Http\Controllers\ArticleController::class . '@validerArticle')->name('articles.validerArticle');


