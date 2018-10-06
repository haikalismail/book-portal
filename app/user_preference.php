<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user_reader;
use App\book_genre;

class user_preference extends Model
{
    protected $table='user_preference';

    protected $fillable = [
        'genre_id','user_id'
    ];

    public function user_reader()
    {
        return $this->hasMany('user_reader', 'user_id');
    }

    public function book_genre()
    {
        return $this->hasMany('book_genre', 'genre_id');
    }
}
