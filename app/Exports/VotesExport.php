<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\VoteCount\Entities\VoteVotesTables;

class VotesExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $gas = VoteVotesTables::join('vote_schools', 'vote_votes_tables.school_id', 'vote_schools.id')
            ->join('vote_class_rooms', 'vote_votes_tables.class_room_id', 'vote_class_rooms.id')
            ->join('vote_tables', 'vote_votes_tables.table_id', 'vote_tables.id')
            ->join('provinces', 'vote_schools.province_id', 'provinces.id')
            ->leftJoin('districts', 'vote_schools.district_id', 'districts.id')
            ->leftJoin('people', 'vote_tables.person_id', 'people.id')
            ->select(
                'vote_schools.full_name AS school_name',
                'vote_class_rooms.name AS classroom_name',
                'vote_tables.number_table',
                'provinces.description AS province_name',
                'districts.description AS district_name',
                'people.number AS person_number',
                'people.full_name AS person_name',
                'vote_votes_tables.id',
                'vote_votes_tables.votes_total'
            )
            ->get();

        return view('votecount::votes.export_excel_all', [
            'gas' => $gas
        ]);
    }
}
