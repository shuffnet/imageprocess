@extends('layouts.app')

@section('content')
    <div class="container print" >
        <div class="row">

            <div class="col-md-8 ">
                <div class="panel panel-default ">


                    <dl class="dl-horizontal">
                        <dt>Session Name:</dt>

                        <dd><strong>{{$session->name}}</strong></dd>
                        <dd>{{$session->contact}}</dd>
                        <dt>Date:</dt>
                        <dd>{{" ". \Carbon\Carbon::parse($session->date)->format('l jS \\of F Y')}}</dd>
                        <dt>Address:</dt>
                        <dd>
                            <div class="list-group col-md-4">
                                <div class="list-group-item">{{$session->address}}</div>
                                <div class="list-group-item">{{$session->city}}</div>
                                <div class="list-group-item">{{$session->state}}</div>
                                <div class="list-group-item">{{$session->zip}}</div>
                                <div class="list-group-item">{{$session->phone}}</div>
                                <div class="list-group-item">{{$session->email}}</div>
                            </div>

                        </dd>

                        <dt>Photographer:</dt>
                        <dd><strong>{{$session->get_photographer->name}}</strong></dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-4 hidden-print">

                            <a href="{{route('session.show', ['id'=>$session->id])}}" class="">Add Subject</a>
                        </div>

                    </div>

                </div>






            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <table class="table">
                    @foreach($session->get_subjects as $subject)
                        <tr>
                            <td>

                                <input type="checkbox" class="btn-complete" data-complete="{{$subject->complete}}" data-id="{{$subject->id}}" @if( $subject->complete == 1 ) checked  @endif   >

                            </td>
                            <td class="hidden-print"><a href="{{route('subject.show', ['subjectID'=>$subject->id, 'sessionID'=>$session->id])}}">View</a><td class="">{{$subject->name}}</td><td class="">{{$subject->email}}</td><td class="">{{$subject->image}}</td></tr>
                    @endforeach


                </table>

            </div>

        </div>
<div class="row">
    <div class="btn btn-primary col-md-offset-2" id="btn-print">Print</div>
</div>
    </div>

@endsection
@section('java')
    <script>
        $('.btn-complete').change(function () {



           $id =  $(this).data('id');
                if( $(this).data('complete')== 0){
                    $checked = 1;
                }else{
                    $checked = 0;
                }


            $.ajax({
                method: 'GET',
                url: '/ajaxsubject/'+$id+'/'+ $checked,
                success: function (data) {

                    window.location.reload();

                }

            });
        })
    </script>


    @endsection