<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	public $timestamps = false;
	protected $table = 'emails';
    protected $fillable = [
        'email',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
