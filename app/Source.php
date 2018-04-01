<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';
    protected $fillable = [
        'source_name','add_information'
    ];

    public function konten()
    {
        return $this->hasMany('App\Item','location_id','id');
    }
}