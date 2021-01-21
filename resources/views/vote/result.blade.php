@extends('layouts.app')



    <div class="card">
        <div class="row">
            <div class="col-12">



                @section('content')


                @if($votes->count())

                    <div class="card my-2">

                        <div class="m-1">
                            <table class="table">
                                <thead>
                                <tr >
                                    <th scope="col">Department</th>
                                    <th scope="col">Candidate</th>
                                    <th scope="col">Total Votes</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($votes as $vote)
                                <tr>
                                     <td>{{$vote->departments}}</td>
                                     <td>{{$vote->nominee}}</td>
                                        <td class="font-weight-bold">{{$vote->total}}</td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div>

                            </div>

<div class="row">
    <div class="col-12">
        <h3 class="text-center">Details</h3>
    </div>
</div>
                            <div class="row" id="printer" style="display: {{isAdmin() ? '' : 'none'}}" >
                                <div class="col-12">
                                    <div class="d-flex justify-content-end" >
                                        <a href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-secondary"> <i class="fa fa-print"></i> print</a>
                                    </div>
                                </div>
                            </div>
                    <div class="card"  id="printableArea">
<div class="d-flex justify-content-center">
    <h1 style="display: none" id="caption" class="">{{$header}} Best Worker</h1>
</div>
                        <div class="row">
                            <div class="container-fluid">

                                <div id="card" class="">



                                    <table border="1" cellpadding="15">


                                        <thead>
                                        <tr >
                                            <th>Name</th>
                                            <th>Communication</th>
                                            <th>Ownership</th>
                                            <th>Respect</th>
                                            <th>Integrity</th>
                                            <th>Prof. / Job Exc.</th>
                                            <th>Team Work</th>
                                            <th>Total Vote</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($votes as $vote)
                                            <tr>
                                                <td class="text-center" data-browse="Name">{{$vote->nominee}}</td>
                                                <td class="text-center" data-browse="Communication">{{$vote->communication}}</td>
                                                <td class="text-center" data-browse="Ownership">{{$vote->ownership}}</td>
                                                <td class="text-center" data-browse="Respect">{{$vote->respect}}</td>
                                                <td class="text-center" data-browse="Integrity">{{$vote->integrity}}</td>
                                                <td class="text-center" data-browse="Prof. / Job Exc.">{{$vote->professionalism}}</td>
                                                <td class="text-center" data-browse="Team Work">{{$vote->team_work}}</td>
                                                <td data-browse="Total Vote" class="font-weight-bold text-center">{{$vote->total}}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                            </div>
                        </div>
                    </div>

                    @else

                        <div class="card">

                            <div class="m-5">
                                <div class="d-flex justify-content-center flex-column">
                                    <h4 class="text-center">Sorry No Results For this Election..... </h4>
                                    <div class="text-center">Nominees might have been deleted or No vote cast</div>
                                </div>

                            </div>
                        </div>

                 @endif


                @endsection
    </div>
    </div>

</div>


<script>
    function printPageArea(areaID){
        const caption =  document.getElementById('caption').style;
        const printContent = document.getElementById(areaID);
        const WinPrint = window.open('', '', 'width=1200,height=1050')
        caption.display = 'block';
        caption.margin = '6px';
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.print();
        caption.display = 'none';

    }
</script>
