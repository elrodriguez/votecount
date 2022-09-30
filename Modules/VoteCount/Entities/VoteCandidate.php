<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteCandidate extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteCandidateFactory::new();
    }
}
