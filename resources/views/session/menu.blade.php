@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 ">
                <div class="panel panel-default">

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success</strong>{{Session::get('success')}}
                        </div>
                        @endif
                    <h4>Thank You</h4>

                </div>
                <div class="row">
                    <div class="col-md-4">

                        <div class=" btn btn-primary">Add Another Subject</div>
                    </div>
                    <div class="col-md-4">

                        <a class="btn btn-default" href="{{route('subject.show',['subjectID'=>$lastID, 'sessionID'=>$session->id])}}">Last Subject</a>

                    </div>
                    <div class="col-md-4">

                        <a class="btn btn-default" href="{{route('session.showsession',['id'=>$session->id])}}">Session</a>

                    </div>

                </div>





            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-4 col-md-offset-1">--}}
                {{--@foreach($session->get_subjects as $subject)--}}
                    {{--<div class="row">{{$subject->name}} <a href="">{{ " ". $subject->email}}</a></div>--}}
                {{--@endforeach--}}
            {{--</div>--}}

        {{--</div>--}}

    </div>

@endsection
