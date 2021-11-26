<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_Categorie extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = ['id_media', 'nom_cat'];
    public $incrementing = false;

      protected $fillable = [
        'id_media', 'nom_cat'
    ];

/*
    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
*/
    protected $table= 'media_categories';
}
