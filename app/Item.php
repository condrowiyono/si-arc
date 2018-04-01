<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'items';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'user_id',
        'owner_id',
        'brand_id',
        'location_id',
        'source_id',
        'item_code',
        'item_name',
        'specification',
        'date_enter',
        'condition',
        'value',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function owner()
    {
        return $this->belongsTo('App\User','owner_id');
    }
    
    public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location','location_id');
    }

    public function source()
    {
        return $this->belongsTo('App\Source','source_id');
    }
}

