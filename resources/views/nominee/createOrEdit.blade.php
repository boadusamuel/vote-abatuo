@extends('layouts.app')

@section('content')

    <div class="card ">
        <div class="col-sm-auto col-md-8 offset-md-2 col-xl-12 ">
            <form method="post" action="{{$nominee->name ?  route('nominees.update', compact('nominee'))  : route('nominees.store') }}" class="m-2 my-4">
                @csrf
                @method( $nominee->name ? 'put' : 'post')
                <div class="form-group">
                    <label for="name" >Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Nominee's Name" required value="{{$nominee->name ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="department_id" >Department</label>
                    <select name="department_id" id="department_id" class="form-control">
                        @foreach($departments as $department)
                        <option value="{{$department->id}}"  @if( isset($nominee->department->name) ) {{ $department->name == $nominee->department->name ? 'selected' : ''}} @endif>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="election_id" >Month Nominated</label>
                    <select name="election_id" id="election_id" class="form-control">
                        @foreach($elections as $election )
                            <option value="{{$election->id}}" @if(isset($nominee->election->name) ) {{ $election->name == $nominee->election->name ? 'selected' : ''}} @endif >{{$election->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary form-control">{{$create}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
