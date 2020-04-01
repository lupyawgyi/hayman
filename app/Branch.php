<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'openingDate',
        'address',
        'city',
        'phone',
        'manager'
    ];
}
