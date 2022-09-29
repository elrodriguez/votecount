<?php

namespace Modules\VoteCount\Http\Livewire\Sachools;

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use Modules\VoteCount\Entities\VoteSchool;
use Illuminate\Support\Facades\Lang;

class SchoolsEdit extends Component
{
    public $external_id;
    public $department_id = '02';
    public $province_id = '0218';
    public $district_id;
    public $full_name;
    public $address;
    public $quamtity_electors;
    public $quantity_tables;
    public $school_id;
    public $departments = [];
    public $provinces = [];
    public $districts = [];

    public function mount($school_id)
    {
        $school = VoteSchool::find($school_id);
        $this->school_id = $school_id;
        $this->province_id = $school->province_id;
        $this->district_id = $school->district_id;
        $this->full_name = $school->full_name;
        $this->address = $school->address;
        $this->quantity_tables = $school->quantity_tables;
        $this->quamtity_electors = $school->quamtity_electors;
        $this->external_id = $school->external_id;

        $this->departments = Department::where('active', true)->get();
        $this->getProvinves();
        $this->getPDistricts();
    }
    public function render()
    {
        return view('votecount::livewire.sachools.schools-edit');
    }

    public function getProvinves()
    {
        $this->provinces = Province::where('department_id', $this->department_id)
            ->where('active', true)->get();
        $this->districts = [];
    }

    public function getPDistricts()
    {
        $this->districts = District::where('province_id', $this->province_id)
            ->where('active', true)->get();
    }

    public function update()
    {
        $this->validate([
            'department_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'full_name' => 'required|string',
            'address' => 'required|string',
            'quamtity_electors' => 'required|numeric',
            'quantity_tables' => 'required|numeric',
            'external_id'   => 'required'
        ]);

        VoteSchool::find($this->school_id)->update([
            'external_id' => $this->external_id,
            'quantity_tables' => $this->quantity_tables,
            'quamtity_electors' => $this->quamtity_electors,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'department_id' => $this->department_id,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id
        ]);

        //PPxFwxh9ShfuFN
        $this->dispatchBrowserEvent('set-schools-save', ['msg' => Lang::get('setting::labels.msg_update')]);
    }
}
