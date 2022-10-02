<?php

namespace Modules\VoteCount\Http\Livewire\Votes;

use Livewire\Component;
use Modules\VoteCount\Entities\VotePoliticalParty;
use Modules\VoteCount\Entities\VoteVotesTablesPoPa;

class VotesTotalPoliticalParties extends Component
{
    public $parties_totales;
    public $totales;

    public function render()
    {
        $this->getData();
        $this->totales = VoteVotesTablesPoPa::join('vote_votes_tables', 'votes_table_id', 'vote_votes_tables.id')
            ->selectRaw("SUM(vote_reg) as total_reg")
            ->selectRaw("SUM(vote_pro) as total_pro")
            ->selectRaw("SUM(vote_dis) as total_dis")
            ->first();
        return view('votecount::livewire.votes.votes-total-political-parties');
    }

    public function getData()
    {
        $pa = VotePoliticalParty::all();
        foreach ($pa as $i => $p) {
            $this->parties_totales[$i] = [
                'img' => $p->logo,
                'name' => $p->name,
                'total_reg' => $this->getVotes($p->id, 'vote_reg'),
                'total_pro' => $this->getVotes($p->id, 'vote_pro'),
                'total_dis' => $this->getVotes($p->id, 'vote_dis')
            ];
        }
    }
    public function getVotes($id, $col)
    {
        return VoteVotesTablesPoPa::where('political_party_id', $id)->sum($col);
    }
}
