<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


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

}

