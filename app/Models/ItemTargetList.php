<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemTargetList extends Model
{
    protected $fillable = [
        'name',
        'target_id'
    ];
}
