<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'fullName',
        'position_id',
        'branch_id'

    ];

    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }
}
