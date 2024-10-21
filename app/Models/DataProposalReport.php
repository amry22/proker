<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposalReport extends Model
{
    protected $fillable = [
        'proposal_id',
        'division_id',
        'department_id',
    ];
}
