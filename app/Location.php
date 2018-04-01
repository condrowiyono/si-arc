<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'location_name','desc'
    ];

    public function konten()
    {
        return $this->hasMany('App\Item','location_id','id');
    }
}
