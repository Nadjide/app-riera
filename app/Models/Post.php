<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //nom de la place
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'cover_images',
    ];
    //première clé
    public $primaryKey = 'id';
    //horodatages
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
