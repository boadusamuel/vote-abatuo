<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriteriaRequest;
use App\Models\Criteria;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $criteria = Criteria::query()->simplePaginate(10);
        $header = 'Criteria';
        return view('criteria.index', ['criterias' => $criteria, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Create Criterion';
        $submit = 'Submit';
        $criteria = new criteria();
        return view('criteria.createOrEdit', ['header' => $header, 'create'=> $submit, 'criteria' => $criteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CriteriaRequest $request
     * @return RedirectResponse
     */
    public function store(CriteriaRequest $request): RedirectResponse
    {
        try {
            criteria::query()->create($request->validated());
            successResponse('Criteria Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('criteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Criteria $criteria
     * @return Response
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Criteria $criterion
     * @return Application|Factory|View|Response
     */
    public function edit(Criteria $criterion)
    {
        $create = 'Update';
        $header = 'Update criterion';
        return \view('criteria.createOrEdit', ['criteria' => $criterion, 'create' => $create, 'header' => $header]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CriteriaRequest $request
     * @param Criteria $criterion
     * @return RedirectResponse
     */
    public function update(CriteriaRequest $request, Criteria $criterion): RedirectResponse
    {
        try {
            $criterion->update($request->validated());
            successResponse('Criteria Updated');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('criteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Criteria $criterion
     * @return RedirectResponse
     */
    public function destroy(Criteria $criterion): RedirectResponse
    {
        try{
            $criterion->delete();
            successResponse('Criterion Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('criteria.index');
    }

}
