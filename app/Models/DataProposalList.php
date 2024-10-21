<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposalList extends Model
{
    protected $fillable = [
        'proposal_id',
        'name',
        'budget_plan',
        'budget_acc',
        'division_id',
        'department_id',
    ];
}
