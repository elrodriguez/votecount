<?php

namespace Modules\VoteCount\Http\Livewire\Votes;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteVotesTablesPoPa;

class VotesTotal extends Component
{
    public $totales;

    public function mount()
    {
        $this->totales = VoteVotesTablesPoPa::join('vote_votes_tables', 'votes_table_id', 'vote_votes_tables.id')
            ->select('type')
            ->selectRaw("SUM(quantity) as total_votes")
            ->groupBy('type')
            ->get();
    }
    public function render()
    {
        return view('votecount::livewire.votes.votes-total');
    }
}
