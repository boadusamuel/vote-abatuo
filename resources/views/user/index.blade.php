@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="m- d-flex justify-content-end">
                    <a href="{{route('users.create')}}" class="btn btn-success m-2" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">New Voter </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="m-2 d-flex justify-content-center">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">Role</th>
                            <th scope="col" class="pl-4" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">{{$user->role->name}}</td>


                                <td class="my-0 py-1" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">
                                    <div class="container d-flex flex-row">
                                        <a href="{{route('users.edit', compact('user'))}}" class="btn btn-primary mr-2"> <i class="fa fa-edit"></i> </a>
                                        <form action="{{route('users.destroy', ['user' => $user])}}" method="post">
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
            <p class="">   {{$users->links()}}</p>
        </div>
    </div>

@endsection
