<?php

namespace Modules\VoteCount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoteVotesTablesPoPa extends Model
{
    use HasFactory;

    protected $fillable = [
        'political_party_id',
        'votes_table_id',
        'quantity'
    ];

    protected static function newFactory()
    {
        return \Modules\VoteCount\Database\factories\VoteVotesTablesPoPaFactory::new();
    }
}
