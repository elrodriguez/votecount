<?php

namespace Modules\VoteCount\Http\Livewire\Tables;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteClassRoom;
use Modules\VoteCount\Entities\VoteSchool;
use Modules\VoteCount\Entities\VoteTable;
use Illuminate\Support\Facades\Lang;
use App\Models\Person;

class TableEdit extends Component
{
    public $schools = [];
    public $classrooms = [];
    public $table_id;
    public $school_id;
    public $classroom_id;
    public $number_table;
    public $number_order;
    public $pavilion;
    public $flat;
    public $person_id;

    public function mount($table_id)
    {
        $this->table_id = $table_id;
        $table = VoteTable::find($table_id);
        $this->school_id = $table->school_id;
        $this->classroom_id = $table->class_room_id;
        $this->number_table = $table->number_table;
        $this->number_order = $table->number_order;
        $this->pavilion = $table->pavilion;
        $this->flat = $table->flat;
        $this->person_id = $table->person_id;
        $this->schools = VoteSchool::select('id', 'full_name')->get();
        $this->getClassroom($this->school_id);
        $this->people = Person::whereNotIn('id', ['1', '2'])->select('id', 'number', 'full_name')->get();
    }

    public function render()
    {
        return view('votecount::livewire.tables.table-edit');
    }


    public function getClassroom($id)
    {
        $this->classrooms = VoteClassRoom::where('school_id', $id)
            ->select('id', 'name')
            ->get();
    }

    public function update()
    {
        $this->validate([
            'school_id' => 'required',
            'classroom_id' => 'required',
            'number_table' => 'required',
            'number_order'  => 'required|numeric',
            'pavilion'      => 'required|string',
            'flat'          => 'required|numeric',
            'person_id'     => 'required'
        ]);

        VoteTable::find($this->table_id)->update([
            'school_id'     => $this->school_id,
            'class_room_id'  => $this->classroom_id,
            'number_table'  => $this->number_table,
            'number_order'  => $this->number_order,
            'pavilion'      => $this->pavilion,
            'flat'          => $this->flat,
            'person_id'     => $this->person_id
        ]);

        $this->dispatchBrowserEvent('vote-table-update', ['msg' => Lang::get('setting::labels.msg_update')]);
    }
}
