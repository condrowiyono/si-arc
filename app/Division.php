<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	public $timestamps = false;
	protected $table = 'divisions';
    protected $fillable = [
        'division','desc',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
