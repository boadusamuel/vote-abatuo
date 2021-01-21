@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="m- d-flex justify-content-end">
            <a href="{{route('departments.create')}}" class="btn btn-success m-2" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">New Department</a>
        </div>
        <div class="m-2 d-flex justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="pl-4" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{$department->name}}</td>
                    <td class="my-0 py-1" style= "display:  {{Auth::user()->role->name !== 'admin'  ? 'none'  : ''}}">
                        <div class="container d-flex flex-row">
                            <a href="{{route('departments.edit', compact('department'))}}" class="btn btn-primary mr-2"> <i class="fa fa-edit"></i> </a>
                            <form action="{{route('departments.destroy', ['department' => $department])}}" method="post">
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
        <div class="d-flex justify-content-center mb-3">
            <p class="">   {{$departments->links()}}</p>
        </div>
    </div>

@endsection
