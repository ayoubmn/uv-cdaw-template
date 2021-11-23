<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Film;

use App\Http\Controllers\listeMediasController;

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

//home page for normal user
Route::get('/', function () {
    $cat=Category::all();
    $film=Film::all();

    return view('indexUser', ['categories' => $cat,'films' => $film]);
});
/*
//tests
Route::get('/listeMedias/{date}', 'App\Http\controllers\listeMediasController@getListeMedias');
Route::get('/categories', 'App\Http\controllers\listeMediasController@getCategories');
*/

//CRUD ADMIN JALON2

//display all medias for admin http://localhost:8080/catalogue/public/admin/listeMedias
Route::get('/admin/listeMedias',[listeMediasController::class, 'getAdminListeMedias']);

//access to the form for adding new films
Route::get('/admin/addMedias', function () {
    $cat=Category::all();
    return view('formAddMediasAdmin', ['categories' => $cat]);
});


//post the form data
Route::post('/admin/addMedias',[listeMediasController::class, 'postAdminListeMedias'] );


//access to the form to update a specific film
Route::get('/admin/addMedias/{film}',[listeMediasController::class, 'updateAdminListeMedias'] );

//delete media
Route::get('/admin/deleteMedias/{film}',[listeMediasController::class, 'deleteAdminListeMedias'] );





/*
    return view('formAddMediasAdmin',["film"=>$film]);
});
*/



/*

Route::get('/nom/{nom}/{prenom}', function ($nom,$prenom) {
    return "Bonjour $nom $prenom";
});

Route::get('/title/{title}', function ($title) {
    return "$title";
})->where(['title' => '[a-z]+']);
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $cat=Category::all();
    $film=Film::all();

    return view('indexUser', ['categories' => $cat,'films' => $film]);
})->name('indexUser');
