<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class book_items extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $table = 'book_items';

    
    public $primaryKey='book_id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo('App\book_category');
    }

    public function author()
    {
        return $this->hasMany('App\book_author');
    }

    public function publisher()
    {
        return $this->hasMany('App\book_publisher');
    }
}
