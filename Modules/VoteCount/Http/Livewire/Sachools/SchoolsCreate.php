<?php

namespace Modules\VoteCount\Http\Livewire\Sachools;

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use Modules\VoteCount\Entities\VoteSchool;
use Illuminate\Support\Facades\Lang;

class SchoolsCreate extends Component
{
    public $external_id;
    public $department_id = '02';
    public $province_id = '0218';
    public $district_id;
    public $full_name;
    public $address;
    public $quamtity_electors;
    public $quantity_tables;

    public $departments = [];
    public $provinces = [];
    public $districts = [];

    public function mount()
    {
        $this->departments = Department::where('active', true)->get();
        $this->getProvinves();
        $this->getPDistricts();
    }

    public function render()
    {

        return view('votecount::livewire.sachools.schools-create');
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

    public function save()
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

        VoteSchool::create([
            'external_id' => $this->external_id,
            'quantity_tables' => $this->quantity_tables,
            'quamtity_electors' => $this->quamtity_electors,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'department_id' => $this->department_id,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id
        ]);

        $this->clearForm();
        $this->dispatchBrowserEvent('set-schools-save', ['msg' => Lang::get('setting::labels.msg_success')]);
    }

    public function clearForm()
    {
        $this->province_id = null;
        $this->district_id = null;
        $this->full_name = null;
        $this->address = null;
        $this->quantity_tables = null;
        $this->quamtity_electors = null;
        $this->external_id = null;
    }
}
