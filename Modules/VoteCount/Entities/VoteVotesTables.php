<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteVotesTables extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'school_id',
        'class_room_id',
        'table_id',
        'user_id',
        'votes_total'
    ];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteVotesTablesFactory::new();
    }
}
