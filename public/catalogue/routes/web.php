<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Media;
use App\Models\Actor;
use App\Models\Media_Categorie;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\listeMediasController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;


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
Route::get('/', function (Request $request) {
    $Media=Media::query();
    if (request('name')) {
        $Media=$Media->where('name', 'Like', '%' . request('name') . '%');
    }
    $Media=$Media->orderBy('created_at', 'DESC')->paginate(8);

    //\Debugbar::error('hi');
    $cat_name=Category::all();
    $cat = DB::table('media_categories')
    ->select('*')
    ->join('categories', 'categories.name', '=', 'media_categories.nom_cat')
    ->get();
    return view('indexUser', ['categories' => $cat,'cat_name' => $cat_name,'Medias' => $Media]);
})->name('home');


Route::get('/medias/{Media}', [mediaController::class, 'getMedia']);

Route::get('/category/{Category}', [mediaController::class, 'getMediaByCategorie']);


/*
//tests
Route::get('/listeMedias/{date}', 'App\Http\controllers\listeMediasController@getListeMedias');
Route::get('/categories', 'App\Http\controllers\listeMediasController@getCategories');
*/


Route::name('user')
  ->prefix('user')
  ->middleware(['auth'])
  ->group(function () {
    Route::get('/profile', function () {
        $cat=Category::all();
        $media = DB::table('media')
        ->select('*')
        ->join('historique', 'media.id', '=', 'historique.id_media')
        ->where('id_user', Auth::user()->id)
        ->orderBy('historique.created_at', 'DESC')
        ->get();
        return view('profile', ['categories' => $cat,'medias'=>$media]);
    });

    Route::post('/update',[userController::class, 'updateUser'] );
    Route::post('/updateAvatar',[userController::class, 'updateUserAvatar'] );
    
    
    
    Route::get('/playlist',[userController::class, 'getUserPlaylist'] );

    Route::post('/playlist',[userController::class, 'postUserPlaylist'] );

    Route::post('/addToPlaylist',[userController::class, 'postToUsersPlaylist'] );


  });


Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'IsAdmin'])
  ->group(function () {

    //CRUD ADMIN JALON2
    //display all medias for admin http://localhost:8080/catalogue/public/admin/listeMedias
    Route::get('/listeMedias',[listeMediasController::class, 'getAdminListeMedias']);

    //access to the form for adding new Medias
    Route::get('/addMedias', function () {
        $cat=Category::all();
        $actors=Actor::all();
        return view('formAddMediasAdmin', ['categories' => $cat,'actors'=>$actors]);
    });

    Route::post('/addActor', function (Request $request) {
        //$cat=Category::all();
        Actor::updateOrCreate(['nom' => $request->nom,'prenom' => $request->prenom]);   
        return back()->with('status', "Successfully submitted !");
    });


    //post the form data
    Route::post('/addMedias',[listeMediasController::class, 'postAdminListeMedias'] );


    //access to the form to update a specific Media
    Route::get('/addMedias/{Media}',[listeMediasController::class, 'updateAdminListeMedias'] );

    //delete media
    Route::get('/deleteMedias/{Media}',[listeMediasController::class, 'deleteAdminListeMedias'] );

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
    return redirect('/');
    $Media=Media::paginate(8);;
    //\Debugbar::error('hi');
    $cat_name=Category::all();
    $cat = DB::table('media_categories')
    ->select('*')
    ->join('categories', 'categories.name', '=', 'media_categories.nom_cat')
    ->get();

    
    return view('indexUser', ['categories' => $cat,'cat_name' => $cat_name,'Medias' => $Media]);
})->name('dashboard');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('template');
})->name('dashboard');
*/