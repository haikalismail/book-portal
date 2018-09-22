<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_category extends Model
{
    protected $table='book_category';
    public $primaryKey='category_id';
    public $timestamps=true;
}
