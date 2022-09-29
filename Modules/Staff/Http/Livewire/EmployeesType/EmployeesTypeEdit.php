<?php

namespace Modules\Staff\Http\Livewire\EmployeesType;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Modules\Staff\Entities\PerActivities;
use Modules\Staff\Entities\StaEmployeeType;

class EmployeesTypeEdit extends Component
{
    public $name;
    public $description;
    public $employee_type;
    public $state;

    public function mount($employee_type_id)
    {
        $this->employee_type = StaEmployeeType::find($employee_type_id);
        $this->name = $this->employee_type->name;
        $this->description = $this->employee_type->description;
        $this->state = $this->employee_type->state;
    }

    public function render()
    {
        return view('staff::livewire.employees_type.employees-type-edit');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'description' => 'max:255'
        ]);

        $activity = new Activity;
        $activity->dataOld(StaEmployeeType::find($this->employee_type->id));

        $this->employee_type->update([
            'name'           => $this->name,
            'description'    => $this->description,
            'state'          => $this->state,
            'person_edit'      => Auth::user()->person_id
        ]);


        $this->dispatchBrowserEvent('per-employees-type-update', ['msg' => Lang::get('staff::labels.msg_update')]);
    }
}
