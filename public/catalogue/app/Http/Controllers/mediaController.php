<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Media_Categorie;
use App\Models\Playlists;
use App\Models\Favori;
use Auth;
use DB;

class mediaController extends Controller
{
public function getMedia(Request $request) {
    $Media = Media::where("id",$request->Media)->first();
    $playlists=Playlists::where('creator_id', Auth::user()->id)->get();
    //\Debugbar::error('hi');
    $cat_name=Category::all();
    $cat = DB::table('media_categories')
    ->select('*')
    ->join('categories', 'categories.name', '=', 'media_categories.nom_cat')
    ->get();
    return view('mediaPage', ['categories' => $cat_name,'cat_name' => $cat,'Media' => $Media,'playlists' => $playlists]);}




}

