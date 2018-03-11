@extends('layouts.app')




@section('content')
    <div class="container">
        <div class="row" id="message"></div>
        <h3 class="col-md-offset-4">Subjects</h3>
        <div class="col col-md-8 col-md-offset-1">
            <table class="table" id="myTable" class="">
                <thead>
                <th>Subjects</th>
                <th>Session</th>

                </thead>
                <tbody>
                @foreach($subjects->sortByDesc('date') as $subject)
                    <tr>
                        <td>
                            <a href="{{route('subject.show',['subjectID'=>$subject->id, 'sessionID'=>$subject->get_session->id])}}">{{$subject->name}}</a>

                        </td>
                        <td>{{$subject->get_session->name. " ". $subject->get_session->date}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>



        </div>




    </div>

@endsection
@section('java')



@endsection