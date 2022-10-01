<?php

namespace Modules\VoteCount\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VotesExport;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('votecount::votes.index');
    }
    public function create()
    {
        return view('votecount::votes.create');
    }
    public function exportExcel()
    {
        return Excel::download(new VotesExport, 'votesExport.xlsx');
    }
}
