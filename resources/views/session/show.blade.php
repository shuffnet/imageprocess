@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row">

                <div class="col-md-6 col-md-offset-2">
                    <div class="panel panel-default">


                            <dl class="dl-horizontal">
                                <dt>Session Name:</dt>
                                <dd><strong>{{$session->name}}</strong>{{" ". \Carbon\Carbon::parse($session->date)->format('l jS \\of F Y')}}</dd>
                            </dl>


                        </div>
                    <div class="row">


                    </div>

                    <form class="" method="POST" action="{{ route('subject.store',['sessionID'=>$session->id]) }}">








                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder='First Name Last Name' autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div>
                            <h5><strong>Terms and conditions</strong></h5>
                            <p  >
                                Disclaimer

                                Our photographers and staff at Image Source put forth our best efforts to ensure that you love your images, in fact we Guarantee it!  That being said, we may charge additional fees if you request additional retouching or request that your photos be re-taken for, but not limited to, the following reasons:  Poor wardrobe choice, color, size or sleeveless shirts.  Hair cut, length or color. Choice of jewelry or accessories  Poor makeup application.
                                At the time your pictures are taken they will be shown to you.  Please voice any concerns you may have at that time so that we can help you resolve them.
                                If you choose and image to be retouched you (or your company) will be charged for that image.  Any additional images will be at an additional cost.
                                Our normal retouching includes stray hair, softening of skin, lines and wrinkles, removal of minor acne and blemishes.
                                Image Source will discard any images not purchased within 30 days or your session date.  Any images that have been purchased will be stored for six months from your session date. There will be a fee of $50 to retrieve your images from storage.

                            </p>

                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <label for="accept"> <input id="accept" type="checkbox" class="" name="accept" value="{{ old('email') }}"  required> I Agree to the terms and conditions </label>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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

        {{--<div class="row">--}}
            {{--<div class="col-md-4 col-md-offset-1">--}}
                {{--@foreach($session->get_subjects as $subject)--}}
                    {{--<div class="row">{{$subject->name}} <a href="">{{ " ". $subject->email}}</a></div>--}}
                {{--@endforeach--}}
            {{--</div>--}}

        {{--</div>--}}

        </div>

@endsection
