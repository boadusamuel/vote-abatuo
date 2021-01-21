<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Facade\FlareClient\Report;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $user = User::query()->simplePaginate(10);
        $header = 'Voters';

        return view('user.index', ['users' => $user, 'header' => $header]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $header = 'Register Voter';
        $submit = 'Create';
        $user = new user();
        $roles = Role::all();
        return view('user.createOrEdit', ['header' => $header, 'create'=> $submit, 'user' => $user, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            User::query()->create($request->validated());
            successResponse('Voter Created');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $create = 'Update';
        $header = 'Update Voter';
        $roles = Role::all();
        return \view('user.createOrEdit', ['user' => $user, 'create' => $create, 'header' => $header, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function update(User $user, UserRequest $request): RedirectResponse
    {
        try {
            $user->update($request->validated());
            successResponse('User Updated');

        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
            successResponse('Voter Deleted');
        }catch (\Exception $exception){
            Report($exception);
            errorResponse();
            return back();
        }
        return redirect()->route('users.index');
    }


}
