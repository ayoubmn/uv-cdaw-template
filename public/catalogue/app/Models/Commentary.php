<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $primaryKey = ['user_id', 'media_id'];
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'media_id',
        'text'
    ];

    protected $table= 'comment';

}