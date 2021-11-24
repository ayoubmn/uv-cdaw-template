<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;

class listeMediasController extends Controller
{
public function getAdminListeMedias() {
    $media= Media::with('category')->get();
    return view('listeMediasAdmin', ['media' => $media]);
}

public function postAdminListeMedias(Request $request) {
    $new = new Media();
    $new->name = $request->name;
    #$cat = Category::select("id")->where("name",$request->category_id);
    #$cat = Category::where("name",$request->category_id)->first();

    $new->category_id = $request->category_id;
    $new->url = $request->url;
    $new->avatar = $request->avatar;
    $new->date = $request->date;
    $new->duree = $request->duree;
    $new->realisateur = $request->realisateur;
    $new->description = $request->description;
    if (!empty($request->id)) {
        Media::where('id', $request->id)->update($request->except('_token'));
    }else {
        Media::create($request->except('_token'));
    }
    //$media= Media::all();
    return redirect('/admin/listeMedias');
    //return view('listeMediasAdmin', ['media' => $media]);
}

public function updateAdminListeMedias(Request $request) {
    $media = Media::where("id",$request->Media)->first();
    $cat=Category::all();
    return view('formAddMediasAdmin', ['media' => $media,'categories' => $cat]);
}

public function deleteAdminListeMedias(Request $request) {
    $media = Media::where("id",$request->Media)->first();
    $media->delete();
    return redirect('/admin/listeMedias');
}


public function getCategories() {
    $cat=Category::all();
    return view('getMedias', ['categories' => $cat]);
}

}

