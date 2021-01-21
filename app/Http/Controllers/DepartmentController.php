<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Facade\FlareClient\Report;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $department = Department::query()->simplePaginate(10);
        $header = 'Departments';

        return view('department.index', ['departments' => $department, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Create Department';
        $submit = 'Submit';
        $department = new Department();
        return view('department.createOrEdit', ['header' => $header, 'create'=> $submit, 'department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        try {
            Department::query()->create($request->validated());
            successResponse('Department Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View|Response
     */
    public function edit(Department $department)
    {
        $create = 'Update';
        $header = 'Update Department';
        return \view('department.createOrEdit', ['department' => $department, 'create' => $create, 'header' => $header]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        try {
            $department->update($request->validated());
            successResponse('Department Updated');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        try{
          $department->delete();
          successResponse('Department Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('departments.index');
    }
}
