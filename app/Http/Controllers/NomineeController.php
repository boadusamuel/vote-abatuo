<?php

namespace App\Http\Controllers;

use App\Http\Requests\NomineeRequest;
use App\Models\Department;
use App\Models\Election;
use App\Models\Nominee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $nominee = Nominee::query()->orderBy('created_at', 'DESC')->simplePaginate(10);
        $header = 'Nominees';
        return view('nominee.index', ['nominees' => $nominee, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Create Nominee';
        $submit = 'Create';
        $nominee = new nominee();
        $departments = Department::query()->select('name', 'id')->get();
        $elections = Election::query()->select('name', 'id')->orderBy('created_at', 'DESC')->get();
        return view('nominee.createOrEdit',
            ['header' => $header, 'create'=> $submit, 'nominee' => $nominee, 'departments' => $departments, 'elections' => $elections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NomineeRequest $request
     * @return RedirectResponse
     */
    public function store(NomineeRequest $request): RedirectResponse
    {
        try {
            nominee::query()->create($request->validated());
            successResponse('Nominee Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('nominees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Nominee $nominee
     * @return Response
     */
    public function show(Nominee $nominee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Nominee $nominee
     * @return Application|Factory|View|Response
     */
    public function edit(Nominee $nominee)
    {
        $create = 'Update';
        $header = 'Update Nominee';
        $departments = Department::query()->select('name', 'id')->get();
        $elections = Election::query()->select('name', 'id')->get();
        return \view('nominee.createOrEdit',
            ['nominee' => $nominee, 'create' => $create, 'header' => $header, 'departments' => $departments, 'elections' => $elections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NomineeRequest $request
     * @param Nominee $nominee
     * @return RedirectResponse
     */
    public function update(NomineeRequest $request, Nominee $nominee): RedirectResponse
    {
        try {
            $nominee->update($request->validated());
            successResponse('Nominee Updated');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('nominees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Nominee $nominee
     * @return RedirectResponse
     */
    public function destroy(Nominee $nominee): RedirectResponse
    {
        try {
            $nominee->delete();
            successResponse('Nominee Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('nominees.index');
    }
}
