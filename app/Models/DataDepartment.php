<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDepartment extends Model
{
    protected $fillable = [
        'name',
        'division_id'
    ];

    function division() {
        return $this->belongsTo(DataDivision::class, 'division_id', 'id');
   }
}
