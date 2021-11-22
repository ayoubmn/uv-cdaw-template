<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Film;

class listeMediasController extends Controller
{
public function getAdminListeMedias() {
    $media= Film::with('category')->get();
    return view('listeMediasAdmin', ['media' => $media]);
}

public function postAdminListeMedias(Request $request) {
    $new = new Film();
    $new->name = $request->name;
    #$cat = Category::select("id")->where("name",$request->category_id);
    $cat = Category::where("name",$request->category_id)->first();

    $new->category_id = $cat->id;
    $new->url = $request->url;
    $new->avatar = $request->avatar;
    $new->duree = $request->duree;
    $new->realisateur = $request->realisateur;
    $new->description = $request->description;
    $new->save();
    //$media= Film::all();

    return redirect('/admin/listeMedias');
    //return view('listeMediasAdmin', ['media' => $media]);
}

public function updateAdminListeMedias(Request $request) {
    $media = Film::where("id",$request->film)->first();
    $cat=Category::all();
    return view('formAddMediasAdmin', ['media' => $media,'categories' => $cat]);
}

public function deleteAdminListeMedias(Request $request) {
    $media = Film::where("id",$request->film)->first();
    $media->delete();
    return redirect('/admin/listeMedias');
}


public function getCategories() {
    $cat=Category::all();
    return view('getfilms', ['categories' => $cat]);
}

}

