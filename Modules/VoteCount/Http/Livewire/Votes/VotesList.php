<?php

namespace Modules\VoteCount\Http\Livewire\Votes;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteVotesTables;
use Modules\VoteCount\Entities\VoteVotesTablesPoPa;
use Livewire\WithPagination;

class VotesList extends Component
{
    public $show;
    public $search;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->show = 10;
    }
    public function votesSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('votecount::livewire.votes.votes-list', ['votes' => $this->getVotes()]);
    }

    public function getVotes()
    {
        $text = $this->search;
        return VoteVotesTables::leftJoin('vote_schools', 'vote_votes_tables.school_id', 'vote_schools.id')
            ->leftJoin('vote_class_rooms', 'vote_votes_tables.class_room_id', 'vote_class_rooms.id')
            ->leftJoin('vote_tables', 'vote_votes_tables.table_id', 'vote_tables.id')
            ->leftJoin('provinces', 'vote_schools.province_id', 'provinces.id')
            ->leftJoin('districts', 'vote_schools.district_id', 'districts.id')
            ->leftJoin('people', 'vote_tables.person_id', 'people.id')
            ->select(
                'vote_schools.full_name AS school_name',
                'vote_class_rooms.name AS classroom_name',
                'vote_tables.number_table',
                'provinces.description AS province_name',
                'districts.description AS district_name',
                'people.number AS person_number',
                'people.full_name AS person_name',
                'vote_votes_tables.id',
                'vote_votes_tables.votes_total'
            )
            ->when($text, function ($query) use ($text) {
                $query->where('people.full_name', 'like', '%' . $text . '%')
                    ->orWhere('vote_tables.number_table', '=', $text);
            })
            ->paginate($this->show);
    }

    public function deleteVotes($id)
    {
        try {
            VoteVotesTablesPoPa::where('votes_table_id', $id)->delete();
            VoteVotesTables::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-school-delete', ['res' => $res]);
    }
}
