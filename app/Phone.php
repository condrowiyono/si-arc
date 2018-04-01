<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	public $timestamps = false;
	protected $table = 'phones';
    protected $fillable = [
        'phone',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
