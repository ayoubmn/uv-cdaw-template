<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Media_Categorie;
use App\Models\Playlists;
use App\Models\Favori;
use App\Models\Historique;
use App\Models\Comment;

use Auth;
use DB;

class mediaController extends Controller
{
public function getMedia(Request $request) {
    $favoris=null;
    $playlists=null;
    $Media = Media::where("id",$request->Media)->first();

    //\Debugbar::error('hi');
    $cat_name=Category::all();
    $cat = DB::table('media_categories')
    ->select('*')
    ->join('categories', 'categories.name', '=', 'media_categories.nom_cat')
    ->get();
    
    $actors = DB::table('media_actor')
    ->select('*')
    ->join('actor', 'media_actor.actor_id', '=', 'actor.id')
    ->where('media_actor.media_id',$Media->id)
    ->get();

    $comments = DB::table('users')
    ->select('*')
    ->join('comment', 'users.id', '=', 'comment.user_id')
    ->where("media_id",$Media->id)
    ->paginate(5);

    if (Auth::check()) {
        Historique::updateOrCreate(['id_user' => Auth::user()->id,'id_media' => $Media->id]);
        $playlists=Playlists::where('creator_id', Auth::user()->id)->get();
        $favoris=Favori::where('user_id', Auth::user()->id)->get();
    }

    return view('mediaPage', ['categories' => $cat_name,'cat_name' => $cat,'Media' => $Media, 'favoris' => $favoris,'playlists' => $playlists,'actors'=>$actors,'comments'=>$comments]);
}

public function getMediaByCategorie(Request $request) {
    //\Debugbar::error('hi');
    $cat_name=Category::all();
    $Media = DB::table('media_categories')
    ->select('*')
    ->join('media', 'media.id', '=', 'media_categories.id_media')
    ->where('nom_cat',$request->Category)
    ->paginate(8);

    $cat = DB::table('media_categories')
    ->select('*')
    ->join('categories', 'categories.name', '=', 'media_categories.nom_cat')
    ->get();

    return view('mediaByCategory', ['categories' => $cat_name,'cat_name' => $cat,'Medias' => $Media]);
}

}

