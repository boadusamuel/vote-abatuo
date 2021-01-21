@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="m- d-flex justify-content-end">
                    <a href="{{route('nominees.create')}}" class="btn btn-success m-2" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">New Nominee</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                @if($nominees->count())
                <div class="m-2 d-flex justify-content-center">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Month Nominated</th>
                            <th scope="col" class="pl-2" style= "display:{{ isAdmin()  ? ''  : 'none'}}">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nominees as $nominee)
                            <tr>
                                <td>{{$nominee->name}}</td>
                                <td>{{$nominee->department->name}}</td>
                                <td>{{$nominee->election->name}}</td>
                                <td class="my-0 py-1" style= "display:{{ isAdmin()  ? ''  : 'none'}}">
                                    <div class="container d-flex flex-row">
                                    <a href="{{route('nominees.edit', compact('nominee'))}}" class="btn btn-primary mr-2" > <i class="fa fa-edit"></i> </a>
                                    <form action="{{route('nominees.destroy', ['nominee' => $nominee])}}" method="post" >
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
                @else
                    <div class="row">
                        <div class="col-12 mt-3">
                            <h4 class="text-center">No Nominees Yet!!! Please create some and let the voting begin <i class="fa fa-smile-o"></i> </h4>
                        </div>
                    </div>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mb-3">
            <p class="">   {{$nominees->links()}}</p>
        </div>
    </div>

@endsection
