<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Models\Criteria;
use App\Models\Election;
use App\Models\Nominee;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $header = "Results";
        $votes = Vote::query()->join('nominees', 'votes.nominee_id', '=', 'nominees.id' ) ->
            join('elections', 'nominees.election_id', '=', 'elections.id')->
            join('departments', 'nominees.department_id', '=', 'departments.id')->
        select('nominee_id','nominees.name as nominee','departments.name','elections.name', 'elections.completed',DB::raw('SUM(communication) as communication'),
            DB::raw('SUM(ownership) as ownership'),DB::raw('SUM(respect) as respect'),
            DB::raw('SUM(integrity) as integrity'), DB::raw('SUM(professionalism) as professionalism'),
            DB::raw('SUM(team_work) as team_work'),DB::raw('(SUM(communication) + SUM(ownership) + SUM(respect)
            + SUM(integrity) + SUM(professionalism)+ SUM(team_work)) as total'))
            ->whereRaw('elections.completed = true')
            ->groupBy('nominee_id', 'nominees.name', 'departments.name' ,'elections.name','elections.completed')
            ->orderByRaw('total DESC')->get();

        return view('vote.result', ['votes' => $votes, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Cast Vote';
        $submit = 'Submit';

        $nominees = Nominee::query()->with('user') ->
        join('elections', 'nominees.election_id', '=', 'elections.id')->
                    select('nominees.id','nominees.name', 'elections.completed')->whereRaw('elections.completed = false')->get();
                    return view('vote.createOrEdit', ['header' => $header, 'create'=> $submit, 'nominees' => $nominees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest $request
     * @return RedirectResponse
     */
    public function store(VoteRequest $request): RedirectResponse
    {

        try {
            Vote::query()->create($request->validated());
            successResponse('Vote Successful..!! Hope your Candidate Wins');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('votes.create');
    }

     /*
     * @param Vote $vote
     * @return Application|Factory|View|RedirectResponse
     */
    public function thanks()
    {
        return \view('vote.index');

    }
}
