<?php

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
    #return "<h2>hello world</h2>";
    #echo <h2>hello world</h2>
    
    return view('listeMedias');
});


Route::get('/nom/{nom}/{prenom}', function ($nom,$prenom) {
    return "Bonjour $nom $prenom";
});

Route::get('/title/{title}', function ($title) {
    return "$title";
})->where(['title' => '[a-z]+']);


Route::get('/listeMedias/{date}', 'App\Http\controllers\listeMediasController@getListeMedias');


Route::get('/categories', 'App\Http\controllers\listeMediasController@getCategories');




//CRUD ADMIN
Route::get('/admin/listeMedias', 'App\Http\controllers\listeMediasController@getAdminListeMedias');

Route::post('/admin/addMedias', 'App\Http\controllers\listeMediasController@postAdminListeMedias');

Route::get('/admin/addMedias/{film}',[listeMediasController::class, 'updateAdminListeMedias'] );

Route::get('/admin/deleteMedias/{film}',[listeMediasController::class, 'deleteAdminListeMedias'] );


Route::get('/admin/addMedias', function () {
    return view('formAddMediasAdmin');
});


