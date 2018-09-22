<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_contributor extends Model
{
    protected $table='book_contributor';
    public $primaryKey='contribute_id';
    public $timestamps=true;
}
