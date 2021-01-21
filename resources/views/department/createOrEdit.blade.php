@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="col-sm-auto col-md-4 col-xl-6">
            <form method="post" action="{{$department->name ?  route('departments.update', compact('department'))  : route('departments.store') }}" class="m-2">
                @csrf
                @method( $department->name ? 'put' : 'post')
                <div class="form-group">
                    <label for="name" >Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Department Name" required value="{{$department->name ?? ''}}">
                </div>
                <div class="form-group">
                 <button class="btn btn-secondary">{{$create}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
