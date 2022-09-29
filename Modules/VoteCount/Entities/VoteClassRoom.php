<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id', 'name'
    ];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteClassRoomFactory::new();
    }
}
