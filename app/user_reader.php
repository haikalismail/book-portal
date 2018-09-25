<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class user_reader extends Eloquent  implements Authenticatable
{
    use AuthenticableTrait;
    protected $table='user_reader';
    protected $primaryKey='user_id';



    protected $hidden = [
        'userpass',
    ];
}
