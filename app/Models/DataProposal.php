<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposal extends Model
{
    protected $fillable = [
        'proker_id',
        'implementation_id',
        'timeline',
        'division_id',
        'department_id',
        'division_acc',
        'financial_manager_acc',
    ];
}
