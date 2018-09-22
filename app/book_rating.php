<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_rating extends Model
{
    protected $table='book_rating';
    public $primaryKey='rating_id';
    public $timestamps=true;
}
