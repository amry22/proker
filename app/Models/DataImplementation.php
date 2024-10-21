<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataImplementation extends Model
{

    protected $casts = [
        'timeline' => 'array',
        'budget_source' => 'array',
    ];

    protected $fillable = [
        'name',
        'qualitative',
        'quantitative',
        'timeline',
        'budget',
        'budget_source',
        'proker_id',
        'division_id',
        'department_id',
        'is_acc',
        'is_budget_acc',
        'note',
    ];

    function proker() {
        return $this->belongsTo(DataProker::class, 'proker_id', 'id');
    }

    function report(){
        return $this->hasOne(DataImplementationReport::class, 'implementation_id', 'id');
    }

    function getTimeline($bulan)  {
        return $this->DataImplementation::where(filterRole())->where('timeline', $bulan)->get();
    }
}
