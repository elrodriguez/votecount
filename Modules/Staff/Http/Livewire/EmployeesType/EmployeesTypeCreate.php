<?php

namespace Modules\Staff\Http\Livewire\EmployeesType;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Staff\Entities\StaEmployeeType;

class EmployeesTypeCreate extends Component
{
    public $name;
    public $description;
    public $state = true;

    public function render()
    {
        return view('staff::livewire.employees_type.employees-type-create');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'description' => 'max:255'
        ]);

        $type_employee = StaEmployeeType::create([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
            'person_create' => Auth::user()->person_id
        ]);


        $this->clearForm();
        $this->dispatchBrowserEvent('per-employees-type-save', ['msg' => Lang::get('staff::labels.msg_success')]);
    }

    public function  clearForm()
    {
        $this->name = '';
        $this->description = '';
        $this->state = true;
    }
}
