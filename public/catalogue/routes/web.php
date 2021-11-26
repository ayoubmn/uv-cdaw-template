<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Media;

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
    $Media=Media::all();
    \Debugbar::error('hi');

    return view('indexUser', ['categories' => $cat,'Medias' => $Media]);
});
/*
//tests
Route::get('/listeMedias/{date}', 'App\Http\controllers\listeMediasController@getListeMedias');
Route::get('/categories', 'App\Http\controllers\listeMediasController@getCategories');
*/




Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'IsAdmin'])
  ->group(function () {


    //CRUD ADMIN JALON2

    //display all medias for admin http://localhost:8080/catalogue/public/admin/listeMedias
    Route::get('/admin/listeMedias',[listeMediasController::class, 'getAdminListeMedias']);

    //access to the form for adding new Medias
    Route::get('/admin/addMedias', function () {
        $cat=Category::all();
        return view('formAddMediasAdmin', ['categories' => $cat]);
    });


    //post the form data
    Route::post('/admin/addMedias',[listeMediasController::class, 'postAdminListeMedias'] );


    //access to the form to update a specific Media
    Route::get('/admin/addMedias/{Media}',[listeMediasController::class, 'updateAdminListeMedias'] );

    //delete media
    Route::get('/admin/deleteMedias/{Media}',[listeMediasController::class, 'deleteAdminListeMedias'] );

    Route::get('/admin/dashboard', 'Adminpanel\Dashboard@index');        
    
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
});



/*
    return view('formAddMediasAdmin',["Media"=>$Media]);
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
    $Media=Media::all();

    return view('indexUser', ['categories' => $cat,'Medias' => $Media]);
})->name('indexUser');
