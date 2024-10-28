<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposalReport extends Model
{
    protected $fillable = [
        'proker_id',
        'implementation_id',
        'timeline',
        'proposal_id',
        'division_id',
        'department_id',
    ];
}
