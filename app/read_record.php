<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class read_record extends Model
{
    protected $table='read_record';
    public $primaryKey='record_id';
    public $timestamps=true;

    public function book()
    {
        return $this->belongsTo('App\Models\book_items');
    }
    
}
