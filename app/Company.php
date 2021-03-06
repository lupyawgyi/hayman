<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'contactOne',
        'phoneOne',
        'contactTwo',
        'phoneTwo',
        'website',
        'address'
    ];
}
