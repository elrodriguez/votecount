<?php

namespace Modules\VoteCount\Http\Livewire\Sachools;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteClassRoom;
use Illuminate\Support\Facades\Lang;

class SchoolsClassrooms extends Component
{
    public $name;
    public $school_id;
    public $classrooms = [];

    public function mount($school_id)
    {
        $this->school_id = $school_id;
    }

    public function render()
    {
        $this->getClassrooms();
        return view('votecount::livewire.sachools.schools-classrooms');
    }

    public function getClassrooms()
    {
        $this->classrooms = VoteClassRoom::where('school_id', $this->school_id)->get();
    }

    public function saveClassroom()
    {
        $this->validate([
            'name' => 'required'
        ]);
        VoteClassRoom::create([
            'school_id' => $this->school_id,
            'name' => $this->name
        ]);
        $this->name = null;
        $this->dispatchBrowserEvent('vote-schools-classroom-save', ['msg' => Lang::get('setting::labels.msg_success')]);
    }

    public function deleteClassRoom($id)
    {
        try {
            VoteClassRoom::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-school-delete', ['res' => $res]);
    }
}
