<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProposalReportList extends Model
{
    protected $fillable = [
        'proposal_report_id',
        'date',
        'name',
        'budget',
        'file',
        'division_id',
        'department_id',
    ];
}
