<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
//    protected $guarded = [];
    protected $fillable = [
        'name',
        'openingDate',
        'address',
        'city',
        'phone',
        'manager'
    ];
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id', 'id');
    }
}
