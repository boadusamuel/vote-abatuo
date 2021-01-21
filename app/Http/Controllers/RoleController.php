<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $roles = Role::query()->simplePaginate(10);
        $header = 'Role';

        return view('role.index', ['roles' => $roles, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Create Role';
        $submit = 'Submit';
        $role = new role();
        return view('role.createOrEdit', ['header' => $header, 'create'=> $submit, 'role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        try {
            Role::query()->create($request->validated());
            successResponse('Role Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View|Response
     */
    public function edit(Role $role)
    {
        $create = 'Update';
        $header = 'Update Role';
        return \view('role.createOrEdit', ['role' => $role, 'create' => $create, 'header' => $header]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        try {
            $role->update($request->validated());
            successResponse('Role Updated');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        try {
            $role->delete();
            successResponse('Role Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('roles.index');
    }
}
