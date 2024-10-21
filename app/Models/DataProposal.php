<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposal extends Model
{
    protected $fillable = [
        'implementation_id',
        'timeline_id',
        'division_id',
        'department_id',
        'division_acc',
        'financial_manager_acc',
    ];
}
