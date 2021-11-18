<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Film;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('film', function (Request $request) {
    $film = Film::create($request->all());
    $cat = Category::find($request->category);
    $film->category=$cat->id;
    $film->save();
    return response()->json(["objet" => $film, "msg" => "Ajouté avec succès"]);
});

Route::get('film', function () {
    $film = Film::all();
    return response()->json(["objet" => $film]);
});

Route::delete('film/{id}', function ($id) {
    $film = Film::find($id);
    $film->delete();
    return response()->json("Supprimé avec succès");
});

Route::put('film/{id}', function (Request $request, $id) {
    $film = Film::find($id);

    if ($request->has('name')) {
        $film->name = $request->input('name');
    }
    if ($request->has('category')) {
        $film->category = $request->input('category');
    }
    if ($request->has('url')) {
        $film->url = $request->input('url');
    }

    $film->save();
    return response()->json("Modifié avec succès");
});