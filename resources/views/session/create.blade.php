@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">

                <h3>Enter New Session</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                                <div class="btn btn-primary col-md-2 col-md-offset-4" id="company-btn">Company</div>
                                <div class="btn btn-primary col-md-2" id="individual-btn">Individual</div>
                        </div>
                        <div class="row hidden" id="company-form">
                          <form id="company" class="form" method="POST" action="{{ route('session.store') }}">

                                <br>
                                        <div class=" row">
                                            <div class="form-group col-md-4 col-md-offset-4">
                                                <select name="company" id="" class="form-control col-md-2 ">
                                                    <option value="" selected disabled="">Select Company</option>
                                                    @foreach(\App\Company::all() as $company)
                                                        <option value="{{$company->id}}">{{$company->company}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="  row">
                                            <div class="form-group col-md-4 col-md-offset-4">
                                                <select name="photographer" id="" class="form-control ">
                                                    <option value="" selected disabled="">Select Photographer</option>
                                                    @foreach(\App\User::all() as $photographer)
                                                        <option value="{{$photographer->id}}">{{$photographer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="  row">
                                            <div class="form-group col-md-4 col-md-offset-4">
                                                <input class="" name="date" type="date" value="{{\Carbon\Carbon::now()->setTimezone('America/New_York')->format('Y-m-d')}}">
                                                <input class="hidden" type="text" name="is_company" value="2">
                                                <input type="text" class="hidden" name="multiple" value="0">
                                                <label for="multiple"> Multiple <input type="checkbox" name="multiple" value="1"> </label>
                                                {{ csrf_field() }}
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary form-control">
                                                  Save
                                                </button>
                                            </div>
                                        </div>




                            </form>
                        </div>
                        <div class="row hidden" id="individual-form" style="padding-top: 50px">

                            <div class="col-md-8 col-md-offset-2">
                                <form class="" method="POST" action="{{route('session.store') }}">

                                    <input class="hidden" type="text" name="is_company" value="1">
                                    {{--<div class="row">--}}
                                        {{--<select name="photographer" id="" class="form-control ">--}}
                                            {{--<option value="" selected disabled="">Select Photographer</option>--}}
                                            {{--@foreach(\App\User::all() as $photographer)--}}
                                                {{--<option value="{{$photographer->id}}">{{$photographer->name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}

                                    {{--</div>--}}
                                    {{--<div class="row">--}}

                                        {{--<input class="" name="date" type="date" value="{{\Carbon\Carbon::now()->setTimezone('America/New_York')->format('Y-m-d')}}">--}}

                                    {{--</div>--}}

                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                            <div class="col-md-8">
                                                <select name="photographer" id="" class="form-control ">
                                                    <option value="" selected disabled="">Select Photographer</option>
                                                    @foreach(\App\User::all() as $photographer)
                                                        <option value="{{$photographer->id}}">{{$photographer->name}}</option>
                                                    @endforeach
                                                </select>
                                                <input class="form-control" name="date" type="date" value="{{\Carbon\Carbon::now()->setTimezone('America/New_York')->format('Y-m-d')}}">

                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder='First Name Last Name' autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                                @endif
                                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder='Address' autofocus>

                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                                @endif
                                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required placeholder='City' autofocus>

                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('city') }}</strong>
                                                     </span>
                                                @endif
                                                <input id="state" type="text" class="form-control" name="state" value="{{ old('address') }}" required placeholder='State' autofocus>

                                                @if ($errors->has('state'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('state') }}</strong>
                                                     </span>
                                                @endif
                                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required placeholder='Zip' autofocus>

                                                @if ($errors->has('zip'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('zip') }}</strong>
                                                     </span>
                                                @endif
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder='Phone' autofocus>

                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                      <strong>{{ $errors->first('phone') }}</strong>
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
                                        {{--<p>--}}
                                            {{--There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.--}}


                                        {{--</p>--}}
                                        <p>

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
                                            <button type="submit" class="btn btn-primary form-control">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection