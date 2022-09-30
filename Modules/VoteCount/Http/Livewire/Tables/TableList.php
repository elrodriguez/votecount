<?php

namespace Modules\VoteCount\Http\Livewire\Tables;

use Livewire\Component;
use Modules\VoteCount\Entities\VoteSchool;
use Livewire\WithPagination;
use Modules\VoteCount\Entities\VoteTable;

class TableList extends Component
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
        return view('votecount::livewire.tables.table-list', ['tables' => $this->getTables()]);
    }

    public function tablesSearch()
    {
        $this->resetPage();
    }

    public function getTables()
    {
        return VoteTable::join('vote_schools', 'school_id', 'vote_schools.id')
            ->join('vote_class_rooms', 'class_room_id', 'vote_class_rooms.id')
            ->join('people', 'person_id', 'people.id')
            ->select(
                'vote_schools.full_name',
                'vote_class_rooms.name',
                'vote_tables.id',
                'vote_tables.number_table',
                'vote_tables.number_order',
                'vote_tables.pavilion',
                'vote_tables.flat',
                'people.full_name AS person_name',
                'people.number AS person_number'
            )
            ->where('number_table', 'like', '%' . $this->search . '%')
            ->paginate($this->show);
    }

    public function deleteTable($id)
    {
        try {
            VoteTable::find($id)->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }
        $this->dispatchBrowserEvent('set-school-delete', ['res' => $res]);
    }
}
