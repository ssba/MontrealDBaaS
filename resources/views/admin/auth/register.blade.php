
@extends('admin.layout')

@section('body-class', 'hold-transition register-page')

@section('body-content')

    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('IndexPage') }}"><b>Montreal</b>DBaaS</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('Auth:Registration') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('fname') ? ' has-error' : 'has-feedback' }} ">
                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}"  placeholder="First Name" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('lname') ? 'has-error' : 'has-feedback' }} ">
                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}"  placeholder="Last Name" required >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-feedback' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" placeholder="Last Name" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-feedback' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div>

            <a href="{{ route('Auth:Login') }}" class="text-center">I already have a membership</a>
        </div>
    </div>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

@endsection





