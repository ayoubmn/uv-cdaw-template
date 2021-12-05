<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Media_Categorie;
use App\Models\MediaActor;
use App\Models\User;


class adminController extends Controller
{

public function getUsers(){
    $users= User::all();
    $cat=Category::all();
    return view('usersManageAdmin', ['users' => $users,'categories' => $cat]);

}

public function postUserStatut(Request $request){
    if ($request->statut=="Autorisé") {
        User::where('id', $request->id)->update(array('statut' => 0));
    }else {
        User::where('id', $request->id)->update(array('statut' => 1));
    }

    return back()->with('status', "Successfully submitted !");

}

public function getAdminListeMedias() {
    //$media= Media::with('category')->get();
    $media= Media::paginate(18);
    $cat=Category::all();
    return view('listeMediasAdmin', ['media' => $media,'categories' => $cat]);
}

public function postAdminListeMedias(Request $request) {
    $cat=Category::all();

    if (!empty($request->id)) {
        $media=Media::where('id', $request->id)->update($request->except('_token','category'));
    }else {
        $media=Media::create($request->except('_token'));
        if (!empty($request->actor)) {
            foreach ($request->actor as $key => $value) {
                MediaActor::updateOrCreate(['media_id' => $media->id,'actor_id' => $value]);    
            }
        }
    }

    if (!empty($request->category)) {
        foreach ($request->category as $cat) {
            Media_Categorie::updateOrCreate(['id_media' => $request->id?$request->id:$media->id,'nom_cat' => $cat]);    
        };
    }

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

