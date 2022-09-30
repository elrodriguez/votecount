<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VotePoliticalParty extends Model
{
    use HasFactory;

    protected $table = "vote_political_parties";

    protected $fillable = ['logo', 'name'];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VotePoliticalPartyFactory::new();
    }
}
