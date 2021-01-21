@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="m- d-flex justify-content-end">
                    <a href="{{route('elections.create')}}" class="btn btn-success m-2" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">New Election </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="m-2 d-flex justify-content-center">
                    @if($elections->count())
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Election Name</th>
                            <th scope="col">Election Period</th>
                            <th scope="col">Results</th>
                            <th scope="col" class="pl-4" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elections as $election)
                            <tr>
                                <td>{{$election->name}}</td>
                                <td>{{\Carbon\Carbon::parse($election->period)->format('d M Y')}}</td>

                                @if($election->completed)

                                <td class="my-0 py-1 "><a href="{{route('elections.show', ['election'=> $election])}}" class="btn btn-success " >
                                       Result</a>
                                </td>
                                @else
                                    <td class="my-0 py-1 ">Ongoing</td>
                                @endif()
                                <td class="my-0 py-1" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">
                                    <div class="container d-flex flex-row">
                                    <a href="{{route('elections.edit', compact('election'))}}" class="btn btn-primary mr-2"> <i class="fa fa-edit"></i> </a>
                                    <form action="{{route('elections.destroy', ['election' => $election])}}" method="post">
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
                    @else
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center">No Elections Yet!!! Please create one, select nominees and let the voting begin <i class="fa fa-smile-o"></i> </h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <p class="">   {{$elections->links()}}</p>
        </div>
    </div>

@endsection
