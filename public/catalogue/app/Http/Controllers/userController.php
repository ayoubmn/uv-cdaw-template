<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Favori;
use App\Models\Playlists;
use App\Models\ListedVideo;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use DB;

class userController extends Controller
{
    

public function updateUser(Request $request) {
    $nom=$request->nom;
    $prenom=$request->prenom;
    $email=$request->email;
    $data=array('nom'=>$nom?$nom:Auth::user()->nom,'prenom'=>$prenom?$prenom:Auth::user()->prenom,'email'=>$email?$email:Auth::user()->email);
    $user= User::where('id', Auth::user()->id)->update($data);
    return redirect('/user/profile');
}

public function updateUserAvatar(Request $request) {
    if ($request->hasFile('file')) {
                $image      = $request->file('file');
                $fileName   = time() . '.' . $image->getClientOriginalExtension();
                $name=$request->file->store('avatars', 'public');
                $data=array('profile_photo_path'=>'/catalogue/public/storage/'.$name);
                $user= User::where('id', Auth::user()->id)->update($data);

    }
    return redirect('/user/profile');
}

public function getUserFavori(Request $request) {
    $cat=Category::all();
    $favoris=Favori::where('user_id', Auth::user()->id)->get();

    $media = DB::table('media')
    ->select('*')
    ->join('favori', 'media.id', '=', 'favori.media_id')
    ->get();

    return view('favori', ['categories' => $cat,'favoris' => $favoris,'Media'=>$media]);
}

public function postUserFavori(Request $request) {
    Favori::updateOrCreate(['user_id' => Auth::user()->id,'title' => $request->title]);    
    $cat=Category::all();

    $favoris=Favoris::all();
    return view('favori', ['favoris' => $favoris,'categories' => $cat]);
}


public function getUserPlaylist(Request $request) {
    $cat=Category::all();
    $playlists=Playlists::where('creator_id', Auth::user()->id)->get();

    $media = DB::table('media')
    ->select('*')
    ->join('listed_video', 'media.id', '=', 'listed_video.id_media')
    ->get();

    return view('playlist', ['categories' => $cat,'playlists' => $playlists,'Media'=>$media]);
}

public function postUserPlaylist(Request $request) {
    Playlists::updateOrCreate(['creator_id' => Auth::user()->id,'title' => $request->title]);    
    $cat=Category::all();

    $playlists=Playlists::all();
    return view('playlist', ['playlists' => $playlists,'categories' => $cat]);
}

public function postToUsersPlaylist(Request $request) {
    ListedVideo::updateOrCreate(['id_playlist' => $request->id_playlist,'id_media' => $request->id_media]); 
    $link="/medias/".strval($request->id_media);
    return redirect($link);
}

}

