@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>All Companies</h3>
                @foreach($companies as $company)
                    <a href="">{{$company->company}}</a><br>
                    @endforeach
            </div>
            <div class="col-md-6">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('company.store') }}">
                        {{ csrf_field() }}



                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" placeholder="Company Name" required autofocus>
                                <input id="" type="text" class="form-control" name="address" value="" placeholder="Address" required autofocus>

                                <input id="" type="text" class="form-control" name="city" value="" placeholder="City" required autofocus>
                                <input id="" type="text" class="form-control" name="state" value="" placeholder="State" required autofocus>
                                <input id="" type="text" class="form-control" name="zip" value="" placeholder="Zip" required autofocus>
                                <input id="" type="text" class="form-control" name="contact" value="" placeholder="Contact" required autofocus>
                                <input id="phone" type="text" class="form-control" name="phone" value="" placeholder="Phone" required autofocus>
                                <input id="" type="text" class="form-control" name="email" value="" placeholder="Email" required autofocus>




                            </div>






                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection