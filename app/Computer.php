<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = [
        'local_id',
        'brand',
        'model_or_serial',
        'specification',
        'ip_address',
        'company_id',
        'price',
        'bought_date',
        'image',
        'warranty_card'
    ];
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }
}
