<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Favori;
use App\Models\Comment;
use App\Models\ListedVideo;
use App\Models\AbonnementPlaylist;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use DB;

class commentController extends Controller
{
    

public function postComment(Request $request) {
    Comment::updateOrCreate(['user_id' => Auth::user()->id,'media_id' => $request->media_id,'text' => $request->text]); 
    return back()->with('status', "Successfully submitted !");
}




}

