<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'brand_name','desc'
    ];

    public function konten()
    {
        return $this->hasMany('App\Item','brand_id','id');
    }
}