@extends('layouts.app')

@section('content')

    <div class="card ">

        <div class="col-sm-auto col-md-8 offset-md-2 col-xl-12 ">
            <form method="post" action="{{$user->name ?  route('users.update', compact('user'))  : route('users.store') }}" class="m-2 my-4">
                @csrf

                @method( $user->name ? 'put' : 'post')

                <div class="form-group">
                    <label for="name" >Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Voters Name" required value="{{$user->name ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="phone" >Phone Numbers</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Voters Phone Number" required value="{{$user->phone ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="role_id" >Role</label>

                    <select name="role_id" id="role_id" class="form-control">
                        @foreach($roles as $role )
                        <option value="{{$role->id}}" @if(isset($user->role->name)) {{$user->role->name == $role->name ? 'selected' : ''}}  @endif>{{$role->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Default: tropofarms" value="{{$user->password ?? 'tropofarms'}}" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary form-control">{{$create}}</button>
                </div>
            </form>


        </div>

    </div>

@endsection
