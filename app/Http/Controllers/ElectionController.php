<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElectionRequest;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $elections = Election::query()->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('election.index', ['elections' => $elections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Create Election';
        $submit = 'Submit';
        $election = new Election();
        return view('election.createOrEdit', ['header' => $header, 'create'=> $submit, 'election' => $election]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ElectionRequest $request
     * @return RedirectResponse
     */
    public function store(ElectionRequest $request): RedirectResponse
    {
        try {
            election::query()->create($request->validated());
            successResponse('Election Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('elections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Election $election
     * @return Application|Factory|View|Response
     */
    public function show(Election $election)
    {

        $votes = Vote::query()->join('nominees', 'votes.nominee_id', '=', 'nominees.id' ) ->
        join('elections', 'nominees.election_id', '=', 'elections.id')->
        join('departments', 'department_id', '=', 'departments.id')->
        select('nominee_id','nominees.name as nominee', 'departments.name as departments','elections.name', 'elections.completed',
            DB::raw('SUM(communication) as communication'),
            DB::raw('SUM(ownership) as ownership'),DB::raw('SUM(respect) as respect'),
            DB::raw('SUM(integrity) as integrity'), DB::raw('SUM(professionalism) as professionalism'),
            DB::raw('SUM(team_work) as team_work'),DB::raw('(SUM(communication) + SUM(ownership) + SUM(respect)
            + SUM(integrity) + SUM(professionalism)+ SUM(team_work)) as total') )
            ->whereRaw('elections.completed = true and elections.name = ? ', [$election->name])
            ->groupBy('nominee_id', 'nominees.name', 'departments.name','elections.name','elections.completed')
            ->orderByRaw('total DESC')->get();

        $header = "Results for $election->name " ;

        return view('vote.result', ['votes' => $votes, 'header' => $header]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Election $election
     * @return Application|Factory|View|Response
     */
    public function edit(Election $election)
    {
        $create = 'Update';
        $header = 'Update Election';
        return \view('election.createOrEdit', ['election' => $election, 'create' => $create, 'header' => $header]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ElectionRequest $request
     * @param Election $election
     * @return RedirectResponse
     */
    public function update(ElectionRequest $request, Election $election): RedirectResponse
    {
        try {
            $election->update($request->validated());
            successResponse('Election Updated');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('elections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Election $election
     * @return RedirectResponse
     */
    public function destroy(Election $election): RedirectResponse
    {
        try {
            $election->delete();
            successResponse('Election Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('elections.index');
    }

}
