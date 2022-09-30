<?php

namespace Modules\VoteCount\Http\Livewire\Sachools;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\VoteCount\Entities\VoteSchool;

class SchoolsList extends Component
{
    public $show;
    public $search;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->show = 10;
    }

    public function render()
    {
        return view('votecount::livewire.sachools.schools-list', ['schools' => $this->getSchools()]);
    }

    public function schoolsSearch()
    {
        $this->resetPage();
    }

    public function getSchools()
    {
        return VoteSchool::join('provinces', 'province_id', 'provinces.id')
            ->join('districts', 'district_id', 'districts.id')
            ->select(
                'provinces.description AS province_name',
                'districts.description AS district_name',
                'vote_schools.id',
                'vote_schools.external_id',
                'vote_schools.full_name',
                'vote_schools.address',
                'vote_schools.quamtity_electors',
                'vote_schools.quantity_tables'
            )
            ->where('full_name', 'like', '%' . $this->search . '%')
            ->paginate($this->show);
    }

    public function deleteSchool($id)
    {
        try {
            VoteSchool::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-school-delete', ['res' => $res]);
    }
}
