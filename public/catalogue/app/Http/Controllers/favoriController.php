<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Favori;
use App\Models\Playlists;
use App\Models\ListedVideo;
use App\Models\AbonnementPlaylist;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use DB;

class favoriController extends Controller
{
    

public function addFavori(Request $request) {
    Favori::updateOrCreate(['user_id' => Auth::user()->id,'media_id' => $request->Media]);    
    return back()->with('status', "Successfully submitted !");
}

public function removeFavori(Request $request) {
    Favori::where(['user_id' => Auth::user()->id,'media_id' => $request->Media])->delete();
    return back()->with('status', "Successfully submitted !");
}

public function getAllFavori(Request $request) {
    $cat=Category::all();
    $medias = DB::table('favori')
    ->select('*')
    ->join('media', 'media.id', '=', 'favori.media_id')
    ->where('user_id',Auth::user()->id)
    ->paginate(8);

    return view('favori', ['medias' => $medias,'categories' => $cat]);
}


}

