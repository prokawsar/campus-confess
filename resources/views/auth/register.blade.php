@section('title', 'Register')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        {{--@if(session('registrationComplete'))--}}
            {{--{{session('registrationComplete')}}--}}
        {{--@endif--}}

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="campus" class="col-md-4 control-label">Campus Name</label>

                            <div class="col-md-6">
                                <input id="campus" type="text" class="form-control" name="campus" value ="Daffodil International Academy" readonly required>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" required> I have read <a href="{{ route('terms') }}" target="_blank">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-5">
                    <a class="btn btn-default" href="#">My email is not working</a>
          
                </div>
            </div>
     </div> <!-- end row -->
</div> <!-- end container -->
@endsection

@extends('layouts.partials._footer')