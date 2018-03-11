@extends('layouts.app')




@section('content')
    <div class="container">
        <div class="row" id="message"></div>
        <h3 class="col-md-offset-4">Sessions</h3>
        <div class="col col-md-8 col-md-offset-1">
            <table class="table" id="myTable" class="">
                <thead>
                <th>Session</th>
                <th>Date</th>
                </thead>
                <tbody>
                @foreach($sessions->sortByDesc('date') as $session)
                    <tr>
                        <td>
                        <a href="{{route('session.showsession', ['id'=>$session->id])}}">{{$session->name}}</a>

                        </td>
                        <td>
                            {{$session->date}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



        </div>




    </div>

@endsection
@section('java')

    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('1f11cbbeed0fe3237c36', {
            cluster: 'us2'
        });
        var channel = pusher.subscribe('new-messages');
        channel.bind('App\\Events\\Messages', function(data) {
//            alert('An event was triggered with message: ' + data.user.id);
            $('#message').append(data.user.id);
        });

    </script>
    <script>

    </script>

@endsection