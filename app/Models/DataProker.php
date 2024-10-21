<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProker extends Model
{
    protected $fillable = [
        'name',
        'year',
        'division_id',
        'department_id',
        'is_acc',
    ];

    function division() {
        return $this->belongsTo(DataDivision::class, 'division_id', 'id');
    }

    function department() {
        return $this->belongsTo(DataDepartment::class, 'department_id', 'id');
    }

    function implementation() {
        return $this->hasMany(DataImplementation::class, 'proker_id', 'id');
    }
}
