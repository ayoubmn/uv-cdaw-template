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
                $data=array('profile_photo_path'=>'../storage/'.$name);
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

    return view('favori', ['categories' => $cat,'favoris' => $favoris,'medias'=>$media]);
}

public function postUserFavori(Request $request) {
    Favori::updateOrCreate(['user_id' => Auth::user()->id,'title' => $request->title]);    
    $cat=Category::all();

    $favoris=Favoris::all();
    return view('favori', ['favoris' => $favoris,'categories' => $cat]);
}


//-------------------------playlist---------------------------
public function getUserPlaylist(Request $request) {
    $cat=Category::all();
    $playlists=Playlists::where('creator_id', Auth::user()->id)->get();

    $media = DB::table('media')
    ->select('*')
    ->join('listed_video', 'media.id', '=', 'listed_video.id_media')
    ->get();

    $abonnemet = DB::table('playlists')
    ->select('*')
    ->join('abonnement_playlist', 'playlists.id_playlist', '=', 'abonnement_playlist.id_playlist')
    ->where('id_user', Auth::user()->id)
    ->get();

    return view('playlist', ['categories' => $cat,'playlists' => $playlists,'abonnements'=>$abonnemet,'Media'=>$media]);
}


public function postUserPlaylist(Request $request) {
    Playlists::updateOrCreate(['creator_id' => Auth::user()->id,'title' => $request->title]);    
    $cat=Category::all();
    $media = DB::table('media')
    ->select('*')
    ->join('listed_video', 'media.id', '=', 'listed_video.id_media')
    ->get();
    $playlists=Playlists::where('creator_id', Auth::user()->id)->get();
    return view('playlist', ['playlists' => $playlists,'categories' => $cat,"Media"=>$media]);
}

public function postToUsersPlaylist(Request $request) {
    ListedVideo::updateOrCreate(['id_playlist' => $request->id_playlist,'id_media' => $request->id_media]); 
    $link="/medias/".strval($request->id_media);
    return redirect($link);
}

public function allPlaylists(Request $request) {
    $cat=Category::all();

    $playlists=Playlists::where('title','like','%'.$request->name.'%')->where('creator_id','<>',Auth::user()->id)->get();

    $media = DB::table('media')
    ->select('*')
    ->join('listed_video', 'media.id', '=', 'listed_video.id_media')
    ->get();
    
    return view('searchPlaylist', ['categories' => $cat,'playlists' => $playlists,'Media'=>$media]);
}

public function postAbonnementPlaylist(Request $request) {
    AbonnementPlaylist::updateOrCreate(['id_playlist' => $request->id_playlist,'id_user' => Auth::user()->id]); 
    return back()->with('status', "Successfully submitted !");
}




}

