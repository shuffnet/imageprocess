@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 ">
                <div class="panel panel-default">
                    {!! Form::open(['route' => ['subject.update', 'subjectID'=>$subject->id, 'sessionID'=>$session->id]]) !!}
                    <dl class="dl-horizontal">
                        <dt> Name:</dt>
                        <dd><strong>{{Form::text('name', $subject->name)}}</strong></dd>

                        <dt> Email:</dt>
                        <dd><strong>{{Form::text('email',$subject->email)}}</strong></dd>
                        <dt>Makeup:</dt>
                        @if($subject->makeup == 1)
                            <input class="hidden" type="text" id="makeup" value="1">


                            @else
                            <input class="hidden" type="text" id="makeup" value="0">

                        @endif
                        <dd>
                            <input type="checkbox" name="makeup" id="ismakeup" value="1">

                        </dd>
                        <dt>Notes</dt>
                        <dd ><textarea name="notes" id="" cols="30" rows="10">{{$subject->notes}}
                            </textarea>
                        </dd>
                        <dt>Image #</dt>
                        <dd><input type="text" name='image' class="text-left" value="{{$subject->image  }}"></dd>
                    </dl>



                  {{Form::submit('Update', ['class'=>'btn btn-success col-md-offset-4'])}}
                    {{--<div class="btn btn-primary col-md-4">Cancel</div>--}}
                    <a class="btn-primary btn" href="{{URL::previous()}}">Cancel</a>


                    {!! Form::close() !!}



                </div>
            </div>
        </div>


    </div>

@endsection

