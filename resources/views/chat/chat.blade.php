@extends('layouts.app')




@section('content')

    <div  class="container">

        <style>
            .list-group{
                overflow-y: scroll;
                height: 400px;
            }
        </style>

    <div id="root" class="">
        <div class="col-md-offset-2 col-md-10">
            <li class="list-group-item active " >Chat</li>
            <div class="badge badge-pill">@{{ typing }}</div>
            <ul class="list-group" v-chat-scroll>
                <?php
                    $auth = Auth::user()->id;

                ?>
                    @foreach(\App\Comments::all() as $comment)

                        @if($comment->from_id == $auth)
                        <li class="list-group-item list-group-item-warning " >

                                {{$comment->comment}}


                            <span class="badge  ">{{\App\User::find($comment->from_id)->name}}</span></li>
                @else
                        <li class="list-group-item list-group-item-success " >

                                {{$comment->comment}}

                            <span class="badge  ">{{\App\User::find($comment->from_id)->name}}</span></li>


                        @endif

                        @endforeach
                <message v-for='value,index in chat.message'
                         :key="value.index"
                         :color=chat.color[index]
                         :time="chat.time[index]"

                         :user=chat.user[index]>
                    @{{ value }}
                </message>
            </ul>
            <input type="text" class="form-control" id="input" v-model="message" @keyup.enter="send" >

        </div>



    </div>



</div>





@endsection
@section('java')


@endsection


