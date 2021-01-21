@extends('layouts.app')

@section('content')

    <div class="card ">

        <div class="col-sm-auto col-md-4 col-xl-6">
            <form method="post" action="{{$criteria->name ?  route('criteria.update', ['criterion' => $criteria])  : route('criteria.store') }}" class="m-2">
                @csrf

                @method( $criteria->name ? 'put' : 'post')

                <div class="form-group">
                    <label for="name" >Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Criterion Name" required value="{{$criteria->name ?? ''}}">
                </div>
                <div class="form-group">
                 <button class="btn btn-secondary">{{$create}}</button>
                </div>
            </form>


        </div>

    </div>

@endsection
