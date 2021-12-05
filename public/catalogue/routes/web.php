<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Media;
use App\Models\Actor;
use App\Models\Media_Categorie;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\commentController;
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

Route::name('normal')
  ->middleware(['IsBlocked'])
  ->group(function () {


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


  });





Route::name('user')
  ->prefix('user')
  ->middleware(['auth','IsBlocked'])
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
    
    Route::get('/favori',[userController::class, 'getUserFavori'] );
    Route::post('/favori',[userController::class, 'postUserFavori'] );
    
    Route::get('/playlist',[userController::class, 'getUserPlaylist'] );

    Route::post('/playlist',[userController::class, 'postUserPlaylist'] );

    Route::post('/addToPlaylist',[userController::class, 'postToUsersPlaylist'] );

    Route::post('/searchPlaylist',[userController::class, 'allPlaylists'] );
    Route::get('/searchPlaylist',function(){
        return redirect('/user/playlist');
    });

    Route::post('/playlistAbonn',[userController::class, 'postAbonnementPlaylist'] );
    Route::get('/playlistAbonn',function(){
        return redirect('/user/playlist');
    });

    Route::post('/addComment',[commentController::class, 'postComment'] );


  });


Route::name('admin')
  ->prefix('admin')
  ->middleware(['auth', 'IsAdmin','IsBlocked'])
  ->group(function () {

    //CRUD ADMIN JALON2
    //display all medias for admin http://localhost:8080/catalogue/public/admin/listeMedias
    Route::get('/listeMedias',[adminController::class, 'getAdminListeMedias']);
    Route::get('/usersManage',[adminController::class, 'getUsers']);
    Route::post('/changeUserStatut',[adminController::class, 'postUserStatut']);


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
    Route::post('/addMedias',[adminController::class, 'postAdminListeMedias'] );


    //access to the form to update a specific Media
    Route::get('/addMedias/{Media}',[adminController::class, 'updateAdminListeMedias'] );

    //delete media
    Route::get('/deleteMedias/{Media}',[adminController::class, 'deleteAdminListeMedias'] );

});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');

