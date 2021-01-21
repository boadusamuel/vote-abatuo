@extends('layouts.app')



    <div class="card">
        <div class="row">
            <div class="col-12">



                @section('content')
                    <div style="display: none">  {{$header = 'THANKS FOR VOTING'}} </div>


                    <div class="card">
                        <div class="m-4">

                            <h4 class="text-center">Please wait for the election to end.</h4>
                            <h4 class="text-center">EC will declare the election results soon.</h4>
                        </div>
                    </div>

                @endsection



            </div>
        </div>
    </div>


