<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	public $timestamps = false;
	protected $table = 'socials';
    protected $fillable = [
        'account','type',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
