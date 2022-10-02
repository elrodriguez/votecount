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
            ->selectRaw("SUM(vote_reg) as total_reg")
            ->selectRaw("SUM(vote_pro) as total_pro")
            ->selectRaw("SUM(vote_dis) as total_dis")
            ->first();
    }
    public function render()
    {
        return view('votecount::livewire.votes.votes-total');
    }
}
