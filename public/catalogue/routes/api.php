<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Media;
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

/*

Route::post('Media', function (Request $request) {
    $Media = Media::create($request->all());
    $cat = Category::find($request->category);
    $Media->category=$cat->id;
    $Media->save();
    return response()->json(["objet" => $Media, "msg" => "Ajouté avec succès"]);
});

Route::get('Media', function () {
    $Media = Media::all();
    return response()->json(["objet" => $Media]);
});

Route::delete('Media/{id}', function ($id) {
    $Media = Media::find($id);
    $Media->delete();
    return response()->json("Supprimé avec succès");
});

Route::put('Media/{id}', function (Request $request, $id) {
    $Media = Media::find($id);

    if ($request->has('name')) {
        $Media->name = $request->input('name');
    }
    if ($request->has('category')) {
        $Media->category = $request->input('category');
    }
    if ($request->has('url')) {
        $Media->url = $request->input('url');
    }

    $Media->save();
    return response()->json("Modifié avec succès");
});

*/