<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{url('css/datatables.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">


                        &nbsp;
                    </ul>


                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-2">
            <a href="{{route('session.create')}}">New Session</a><br>
            <a href="{{route('company.index')}}">Add Companies</a><br>
            <a href="{{route('subject.index')}}">All Subjects</a><br>

            <a href="{{route('session.index')}}">All Sessions</a><br>
            <a href="{{route('chat')}}">Chat</a><br>



        </div>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>


    <script>

    @yield('java')
    </script>

    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('js/printThis.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.maskedinput.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            if($('#makeup').val() == 1){
                $('#ismakeup').attr("checked","checked");

            }
            $('#myTable').DataTable({
                dom: 'Bfrtip',

            });

            $('#btn-print').on('click', function () {

                $('.print').printThis({
                    importCSS: true,
                    formValues: false,           // preserve input/form values
                    canvas: false,              // copy canvas elements (experimental)
                    doctypeString: "...",       // enter a different doctype for older markup
                    removeScripts: true,       // remove script tags from print content
                    copyTagClasses: true       // copy classes from the html & body tag
                });
//
            });
            $('#phone').mask('(999) 999-9999');
            if (jQuery) {
                // jQuery is loaded
                alert("Yeah!");
            } else {
                // jQuery is not loaded
                alert("Doesn't Work");
            }
        });


    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{--<script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>--}}
    <script>
        window.Laravel = {!! json_encode([

             'user' => Auth::user(),

         ]) !!};
    </script>
    <script>
        $('#company-btn').on('click', function () {
            $('#company-form').removeClass('hidden');
            $('#individual-form').addClass('hidden');
        });
        $('#individual-btn').on('click', function () {
            $('#individual-form').removeClass('hidden');
            $('#company-form').addClass('hidden');
        });
    </script>


</body>
</html>
