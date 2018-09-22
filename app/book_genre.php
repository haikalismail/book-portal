<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_genre extends Model
{
    protected $table='book_genre';
    public $primaryKey='genre_id';
    public $timestamps=true;
}
