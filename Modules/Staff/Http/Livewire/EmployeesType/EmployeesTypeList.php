<?php

namespace Modules\Staff\Http\Livewire\EmployeesType;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Staff\Entities\StaEmployeeType;
use Illuminate\Support\Facades\Lang;

class EmployeesTypeList extends Component
{
    public $show;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    { //$activities_id
        $this->show = 10;
    }

    public function render()
    {
        return view('staff::livewire.employees_type.employees-type-list', ['employees_type' => $this->getEmployeesType()]);
    }

    public function getEmployeesType()
    {
        return StaEmployeeType::where('name', 'like', '%' . $this->search . '%')->paginate($this->show);
    }

    public function activitiesSearch()
    {
        $this->resetPage();
    }

    public function deleteEmployeeType($id)
    {
        $employee_type = StaEmployeeType::find($id);

        $employee_type->delete();

        $this->dispatchBrowserEvent('per-employees-type-delete', ['msg' => Lang::get('staff::labels.msg_delete')]);
    }
}
