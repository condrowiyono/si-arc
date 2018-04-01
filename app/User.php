<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait; //***


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; //**

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','fullname', 'email', 'password','nim', 'born_date','batch','bio','major','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addresses() {
        return $this->belongsToMany('App\Address');
    }
    
    public function divisions() {
        return $this->belongsToMany('App\Division')->withPivot('year');;
    }

    public function emails() {
        return $this->belongsToMany('App\Email');
    }

    public function phones() {
        return $this->belongsToMany('App\Phone');
    }

    public function socials() {
        return $this->belongsToMany('App\Social');
    }


}