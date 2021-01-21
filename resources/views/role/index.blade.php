@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="m- d-flex justify-content-end">
                    <a href="{{route('roles.create')}}" class="btn btn-success m-2">New Role </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="m-2 d-flex justify-content-center">
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">Roles</th>
                            <th scope="col" class="pl-0 ">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td class="my-0 py-1">
                                    <div class="container d-flex flex-row justify-content-center">
                                        <a href="{{route('roles.edit', compact('role'))}}" class="btn btn-primary mr-2"> <i class="fa fa-edit"></i> </a>
                                        <form action="{{route('roles.destroy', ['role' => $role])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure')"> <i class="fa fa-trash"></i> </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <p class="">   {{$roles->links()}}</p>
        </div>
    </div>

@endsection
