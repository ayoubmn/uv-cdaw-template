<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Media_Categorie;

class listeMediasController extends Controller
{
public function getAdminListeMedias() {
    //$media= Media::with('category')->get();
    $media= Media::all();
    
    return view('listeMediasAdmin', ['media' => $media]);
}


public function postAdminListeMedias(Request $request) {
    if (!empty($request->id)) {
        $media=Media::where('id', $request->id)->update($request->except('_token','category'));
    }else {
        $media=Media::create($request->except('_token'));
    }

    foreach ($request->category as $cat) {
        Media_Categorie::updateOrCreate(['id_media' => $request->id?$request->id:$media->id,'nom_cat' => $cat]);    
    };
    return redirect('/admin/listeMedias');
}


public function updateAdminListeMedias(Request $request) {
    $media = Media::where("id",$request->Media)->first();
    $cat=Category::all();
    return view('formAddMediasAdmin', ['media' => $media,'categories' => $cat]);
}

public function deleteAdminListeMedias(Request $request) {
    $media = Media::where("id",$request->Media)->first();

    $media_cat = Media_Categorie::where("id_media",$request->Media);
    $media_cat->delete();   
    $media->delete();
    return redirect('/admin/listeMedias');
}


public function getCategories() {
    $cat=Category::all();
    return view('getMedias', ['categories' => $cat]);
}

}

