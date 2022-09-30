<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_table',
        'number_order',
        'pavilion',
        'flat',
        'school_id',
        'class_room_id'
    ];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteTableFactory::new();
    }
}
