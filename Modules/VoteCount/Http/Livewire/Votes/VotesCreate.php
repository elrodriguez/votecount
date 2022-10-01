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
    public $type_id = 'M';
    public $total_r = 0;
    public $total_p = 0;
    public $total_d = 0;
    public $total = 0;
    public $votes_total;

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
                'total_r' => 0,
                'total_p' => 0,
                'total_d' => 0
            ];
        }
    }

    public function save()
    {
        $this->validate([
            //'type_id' => 'required',
            'school_id' => 'required',
            'classroom_id' => 'required',
            'table_id' => 'required',
            //'votes_total' => 'required|numeric'
        ]);

        if ($this->politicalparties > 0) {
            foreach ($this->politicalparties as $key => $val) {
                $this->validate([
                    'politicalparties.' . $key . '.id' => 'required',
                    'politicalparties.' . $key . '.total_r' => 'numeric|required',
                    'politicalparties.' . $key . '.total_p' => 'numeric|required'

                ]);
            }
        }
        $vt = VoteVotesTables::create([
            'type'                  => $this->type_id,
            'school_id'             => $this->school_id,
            'class_room_id'         => $this->classroom_id,
            'table_id'              => $this->table_id,
            'user_id'               => Auth::id(),
            'votes_total'           => $this->votes_total
        ]);
        $t = 0;
        //dd($this->politicalparties);
        foreach ($this->politicalparties as $item) {
            $t = $t + $item['total_r'];
            VoteVotesTablesPoPa::create([
                'votes_table_id'        => $vt->id,
                'political_party_id'    => $item['id'],
                'quantity'              => $t,
                'vote_reg'              => $item['total_r'],
                'vote_pro'              => $item['total_p'],
                'vote_dis'              => $item['total_d']
            ]);
        }
        $this->clearFrom();
        $this->dispatchBrowserEvent('vote-table-save', ['msg' => Lang::get('setting::labels.msg_success')]);
    }
    public function recalculatetotal()
    {
        $tr = 0;
        $tp = 0;
        $td = 0;
        foreach ($this->politicalparties as $item) {
            $tr = $tr + (int) $item['total_r'];
            $tp = $tp + (int) $item['total_p'];
            $td = $td + (int) $item['total_d'];
        }
        $this->total_r = $tr;
        $this->total_p = $tp;
        $this->total_d = $td;
    }
    public function clearFrom()
    {
        $this->classroom_id = null;
        $this->table_id = null;
        $this->type_id = null;
        $this->total = 0;
        $this->votes_total = null;
        foreach ($this->politicalparties as $k => $item) {
            $this->politicalparties[$k]['total_r'] = 0;
            $this->politicalparties[$k]['total_p'] = 0;
            $this->politicalparties[$k]['total_d'] = 0;
        }
    }
}
