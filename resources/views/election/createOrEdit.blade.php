@extends('layouts.app')

@section('content')

    <div class="card ">
        <div class="col-sm-auto col-md-4 col-xl-6">
            <form method="post" action="{{ ($election->name) ?  route('elections.update', ['election' => $election])  : route('elections.store') }}" class="m-2">
                @csrf
                @method( $election->name ? 'put' : 'post')
                <div class="form-group">
                    <label for="name" >Election Month-Year</label>
                    <input type="text" name="name" class="form-control" placeholder="January 2020" id="name" required value="{{$election->name ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="period" >Voting Day</label>
                    <input type="date" name="period" class="form-control" id="period" required value="{{$election->period ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="completed" >Completed</label>
                    <select name="completed" id="completed" class="form-control">
                        <option value="0" {{$election->completed == '0' ? 'selected' : ''}}>No</option>
                        <option value="1" {{$election->completed == '1' ? 'selected' : ''}}>Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary">{{$create}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
