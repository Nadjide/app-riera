<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //nom de la place
    protected $table = 'posts';
    //première clé
    public $primaryKey = 'id';
    //horodatages
    public $timestamps = false;
}
