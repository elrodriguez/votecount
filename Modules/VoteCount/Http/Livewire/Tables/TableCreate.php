<?php

namespace Modules\VoteCount\Http\Livewire\Tables;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteClassRoom;
use Modules\VoteCount\Entities\VoteSchool;
use Modules\VoteCount\Entities\VoteTable;
use Illuminate\Support\Facades\Lang;

class TableCreate extends Component
{
    public $schools = [];
    public $classrooms = [];

    public $school_id;
    public $classroom_id;
    public $number_table;
    public $number_order;
    public $pavilion;
    public $flat = 1;

    public function mount()
    {
        $this->schools = VoteSchool::select('id', 'full_name')->get();
    }

    public function render()
    {
        return view('votecount::livewire.tables.table-create');
    }

    public function getClassroom($id)
    {
        $this->classrooms = VoteClassRoom::where('school_id', $id)
            ->select('id', 'name')
            ->get();
    }

    public function save()
    {
        $this->validate([
            'school_id' => 'required',
            'classroom_id' => 'required',
            'number_table' => 'required',
            'number_order'  => 'required|numeric',
            'pavilion'      => 'required|string',
            'flat'          => 'required|numeric'
        ]);

        VoteTable::create([
            'school_id'     => $this->school_id,
            'class_room_id'  => $this->classroom_id,
            'number_table'  => $this->number_table,
            'number_order'  => $this->number_order,
            'pavilion'      => $this->pavilion,
            'flat'          => $this->flat
        ]);
        $this->clearForm();

        $this->dispatchBrowserEvent('vote-table-save', ['msg' => Lang::get('setting::labels.msg_success')]);
    }

    public function clearForm()
    {
        $this->classroom_id = null;
        $this->number_table = null;
        $this->number_order = null;
        $this->pavilion = null;
        $this->flat =  null;
    }
}
