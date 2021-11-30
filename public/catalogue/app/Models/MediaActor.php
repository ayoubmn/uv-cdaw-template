<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaActor extends Model {

    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $primaryKey = ['actor_id', 'media_id'];
    public $incrementing = false;

    protected $fillable = [
        'actor_id',
        'media_id',
    ];

    protected $table= 'media_actor';

}