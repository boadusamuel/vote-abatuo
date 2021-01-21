@extends('layouts.app')

@section('content')
    @if(isAdmin())
    <div style="display: none">  {{$header = 'WELCOME ' }} </div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="text-center">{{user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div>
                <h5 class="text-center">Please navigate to the <a href="{{route('elections.index')}}" class="text-decoration-none">Dashboard</a>  to set the ball rolling <i class="fa fa-circle text-success">......</i> </h5>
            </div>
        </div>
    </div>
</div>
    @else
    <div style="display: none">  {{$header = 'WELCOME ' }} </div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="text-center">{{user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div>
                <h5 class="text-center">Your Vote is Confidential</h5>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
