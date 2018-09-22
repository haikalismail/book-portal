<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_author extends Model
{
    protected $table='book_author';
    public $primaryKey='author_id';
    public $timestamps=true;
}
