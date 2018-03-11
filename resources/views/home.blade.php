@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <a href="{{route('session.index')}}">Show Sessions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
