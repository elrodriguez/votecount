<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'quantity_tables',
        'quamtity_electors',
        'full_name',
        'address',
        'department_id',
        'province_id',
        'district_id'
    ];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteSchoolFactory::new();
    }
}
