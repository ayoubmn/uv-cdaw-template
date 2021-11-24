<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'category_id',
        'url',
        'date',
        'avatar',
        'duree',
        'nbr_saison',
        'rating',
        'realisateur',
        'description'
    ];

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    protected $table= 'media';
}
