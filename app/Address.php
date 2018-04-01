<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	public $timestamps = false;

	protected $table = 'addresses';
    protected $fillable = [
        'address'
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}