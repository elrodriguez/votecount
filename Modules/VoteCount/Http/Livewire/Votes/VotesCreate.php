<?php

namespace Modules\VoteCount\Http\Livewire\Votes;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteClassRoom;
use Modules\VoteCount\Entities\VoteSchool;
use Modules\VoteCount\Entities\VoteTable;
use Illuminate\Support\Facades\Lang;
use Modules\VoteCount\Entities\VotePoliticalParty;
use Modules\VoteCount\Entities\VoteVotesTables;
use Illuminate\Support\Facades\Auth;
use Modules\VoteCount\Entities\VoteVotesTablesPoPa;

class VotesCreate extends Component
{
    public $schools = [];
    public $classrooms = [];
    public $tables = [];
    public $politicalparties = [];

    public $school_id;
    public $classroom_id;
    public $table_id;
    public $type_id;
    public $total = 0;

    public function mount()
    {
        $this->schools = VoteSchool::select('id', 'full_name')->get();
        $this->getPoliticalParty();
    }

    public function render()
    {
        $this->recalculatetotal();
        return view('votecount::livewire.votes.votes-create');
    }

    public function getClassroom($id)
    {
        $this->classrooms = VoteClassRoom::where('school_id', $id)
            ->select('id', 'name')
            ->get();
    }
    public function getTables()
    {
        $this->tables = VoteTable::where('class_room_id', $this->classroom_id)->select('id', 'number_table')->get();
    }

    public function getPoliticalParty()
    {
        $politicalparties = VotePoliticalParty::all();

        foreach ($politicalparties as $k => $politicalparty) {
            $this->politicalparties[$k] = [
                'id' => $politicalparty->id,
                'logo' => $politicalparty->logo,
                'name' => $politicalparty->name,
                'quantity' => 0
            ];
        }
    }

    public function save()
    {
        $this->validate([
            'type_id' => 'required',
            'school_id' => 'required',
            'classroom_id' => 'required',
            'table_id' => 'required'
        ]);

        if ($this->politicalparties > 0) {
            foreach ($this->politicalparties as $key => $val) {
                $this->validate([
                    'politicalparties.' . $key . '.id' => 'required',
                    'politicalparties.' . $key . '.quantity' => 'numeric|required'
                ]);
            }
        }
        $vt = VoteVotesTables::create([
            'type'                  => $this->type_id,
            'school_id'             => $this->school_id,
            'class_room_id'         => $this->classroom_id,
            'table_id'              => $this->table_id,
            'user_id'               => Auth::id()
        ]);
        foreach ($this->politicalparties as $item) {
            VoteVotesTablesPoPa::create([
                'votes_table_id'        => $vt->id,
                'political_party_id'    => $item['id'],
                'quantity'              => $item['quantity']
            ]);
        }
        $this->clearFrom();
        $this->dispatchBrowserEvent('vote-table-save', ['msg' => Lang::get('setting::labels.msg_success')]);
    }
    public function recalculatetotal()
    {
        $tt = 0;
        foreach ($this->politicalparties as $item) {
            $tt = $tt + (int) $item['quantity'];
        }
        $this->total = $tt;
    }
    public function clearFrom()
    {
        $this->classroom_id = null;
        $this->table_id = null;
        $this->type_id = null;
        $this->total = 0;
        foreach ($this->politicalparties as $k => $item) {
            $this->politicalparties[$k]['quantity'] = 0;
        }
    }
}
