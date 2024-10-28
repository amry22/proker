<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataImplementationReport extends Model
{
    protected $fillable = [
        'implementation_id',
        'timeline',
        'target_id',
        'target_list_id',
        'status',
        'description',
        'follow_up',
        'division_id',
        'department_id',
    ];
}
