<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class listeMediasController extends Controller
{
public function getListeMedias($date) {
      return view('listeMedias', ['date' => $date]);
  }

public function getCategories() {
    $cat=Category::all();
    return view('getfilms', ['categories' => $cat]);
}

}

