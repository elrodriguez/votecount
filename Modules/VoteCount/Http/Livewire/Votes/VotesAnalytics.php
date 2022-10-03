<?php

namespace Modules\VoteCount\Http\Livewire\Votes;

use Livewire\Component;
use Modules\VoteCount\Entities\VotePoliticalParty;
use Modules\VoteCount\Entities\VoteVotesTablesPoPa;

class VotesAnalytics extends Component
{
    public $par  = [];
    public $val  = [];
    public $ppar  = [];
    public $total;

    public function render()
    {
        $this->total = VoteVotesTablesPoPa::join('vote_votes_tables', 'votes_table_id', 'vote_votes_tables.id')
            ->selectRaw("SUM(vote_pro) as total_pro")
            ->first();
        $this->getParty();
        return view('votecount::livewire.votes.votes-analytics');
    }
    public function getParty()
    {
        $ppar = VotePoliticalParty::whereIn('id', ['6', '18', '11', '15'])->get();
        foreach ($ppar as $i => $pa) {
            $this->par[$i] = [
                $i, $pa->name
            ];
            $this->val[$i] = [
                $i, $this->getVotes($pa->id, 'vote_pro')
            ];
            $this->ppar[$i] = [
                'logo' => $pa->logo,
                'name' => $pa->name,
                'total_pro' => $this->getVotes($pa->id, 'vote_pro')
            ];
        }
    }
    public function getVotes($id, $col)
    {
        return VoteVotesTablesPoPa::where('political_party_id', $id)->sum($col);
    }
}
