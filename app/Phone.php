<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'phoneNumber',
        'company_id',
    ];
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }
}
