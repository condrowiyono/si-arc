<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
	public $timestamps = false;
	protected $table = 'majors';
    protected $fillable = [
        'name','code'
    ];

}
