@extends('layouts.app')

@section('content')

    <div class="card ">

        <div class="col-sm-auto col-md-4 col-xl-6">
            <form method="post" action="{{$role->name ?  route('roles.update', compact('role'))  : route('roles.store') }}" class="m-2">
                @csrf

                @method( $role->name ? 'put' : 'post')

                <div class="form-group">
                    <label for="name" >Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Role Name" required value="{{$role->name ?? ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary">{{$create}}</button>
                </div>
            </form>


        </div>

    </div>

@endsection
