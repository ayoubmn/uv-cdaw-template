<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'category_id',
        'url',
        'avatar',
        'duree',
        'realisateur',
        'description'
    ];

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    protected $table= 'films';
}
