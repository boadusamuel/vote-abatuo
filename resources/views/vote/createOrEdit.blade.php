@extends('layouts.app')

@section('content')

    <div class="card ">
        @if($nominees->count())


        <div class="col-sm-auto col-md-8 offset-md-2 col-xl-12 ">
            <form method="post" action="{{route('votes.store') }}" class="m-2 my-4">
                @csrf
                <div style="display: none">
                    <label>
                        <input type="text" value="{{user()->id}}" name="user_id">
                    </label>
                </div>

                <div class="form-group">
                    <label for="nominee_id">Select Nominee</label>
                    <select class="form-control" name="nominee_id" id="nominee_id">

                            @foreach($nominees as $nominee)

                        @if(!hasVoted($nominee->id))

                                <option value="{{$nominee->id}}">{{$nominee->name}}</option>

                            @endif


                              @endforeach



                    </select>
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Communication :</p>
                    <label for="communication_yes" >Yes</label>
                    <input type="radio" name="communication" class="custom-radio mr-5" id="communication_yes" value="1" {{old('communication') === '1' ? 'checked' : '' }} >
                    <label for="communication_no" >No</label>
                    <input type="radio" name="communication" class="custom-radio" id="communication_no" value="0" {{old('communication') === '0' ? 'checked' : '' }}>
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Ownership :</p>

                    <label for="ownership_yes" >Yes</label>
                    <input type="radio" name="ownership" class="custom-radio mr-5" id=ownership_yes value="1" {{old('ownership') === '1' ? 'checked' : '' }}  >
                    <label for="ownership_no" >No</label>
                    <input type="radio" name="ownership" class="custom-radio" id="ownership_no" value="0" {{old('ownership') === '0' ? 'checked' : '' }}>

                </div>
                <div class="form-group">
                    <p class="font-weight-bold"> Respect and Empathy:</p>

                    <label for="respect_yes" >Yes</label>
                    <input type="radio" name="respect" class="custom-radio mr-5" id=respect_yes value="1" {{old('respect') === '1' ? 'checked' : '' }}>
                    <label for="respect_no" >No</label>
                    <input type="radio" name="respect" class="custom-radio" id="respect_no" value="0" {{old('respect') === '0' ? 'checked' : '' }}>

                </div>
            <div class="form-group">
                    <p class="font-weight-bold">Integrity :</p>

                    <label for="integrity_yes" >Yes</label>
                    <input type="radio" name="integrity" class="custom-radio mr-5" id="integrity_yes" value="1" {{old('integrity') === '1' ? 'checked' : '' }}>
                    <label for="integrity_no" >No</label>
                    <input type="radio" name="integrity" class="custom-radio" id="integrity_no" value="0" {{old('integrity') === '0' ? 'checked' : '' }}>

                </div>
                <div class="form-group">
                    <p class="font-weight-bold"> Job Excellence and Professionalism:</p>

                    <label for="professionalism_yes" >Yes</label>
                    <input type="radio" name="professionalism" class="custom-radio mr-5" id="professionalism_yes" value="1" {{old('professionalism') === '1' ? 'checked' : '' }}>
                    <label for="professionalism_no" >No</label>
                    <input type="radio" name="professionalism" class="custom-radio" id="professionalism_no" value="0" {{old('professionalism') === '0' ? 'checked' : '' }}>

                </div>
                <div class="form-group">
                    <p class="font-weight-bold"> Team Work:</p>

                    <label for="team_yes" >Yes</label>
                    <input type="radio" name="team_work" class="custom-radio mr-5" id="team_yes" value="1" {{old('team_work') === '1' ? 'checked' : '' }}>
                    <label for="team_no" >No</label>
                    <input type="radio" name="team_work" class="custom-radio" id="team_no" value="0" {{old('team_work') === '0' ? 'checked' : '' }}>

                </div>


                <div class="form-group">
                    <button class="btn btn-secondary text-center">{{$create}}</button>
                </div>
            </form>

            @else
                <div class="m-4 p-2">
                    <h3 class="text-center">No Election Currently !!!.. Please see your Administrator for any concerns. Thank you <i class="fa fa-smile-o"></i> </h3>
                </div>

            @endif



        </div>

    </div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        let value = $('#nominee_id').val();
        if(value !== null){

          return '';
        }else{
            window.location.replace("{{route('thanks')}}");
        }
    })
</script>

