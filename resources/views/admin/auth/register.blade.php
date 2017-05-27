
@extends('admin.layout')

@section('body-class', 'hold-transition register-page')

@section('body-content')

    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('IndexPage') }}">{!! __('core.panel.tpl.main.site_name_html')  !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ __('core.panel.tpl.auth.registration.msg')  }}</p>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('Auth:Registration') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('fname') ? ' has-error' : 'has-feedback' }} ">
                    <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}"  placeholder="{{ __('core.panel.tpl.auth.registration.first_name')  }}" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('fname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('lname') ? 'has-error' : 'has-feedback' }} ">
                    <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}"  placeholder="{{ __('core.panel.tpl.auth.registration.last_name')  }}" required >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('lname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                    @endif
                </div>




                <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-feedback' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('core.email')  }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-feedback' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('core.password')  }}" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('core.retype_password')  }}" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="form-group {{ $errors->has('gender') ? 'has-error' : 'has-feedback' }} ">
                    <label class="radio-inline">
                        {{ __('core.gender')  }}
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="genderRadioM" value="m"> {{ __('core.male')  }}
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="genderRadioF" value="f"> {{ __('core.female')  }}
                    </label>
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">{!! __('core.panel.tpl.auth.registration.terms')  !!}</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('core.panel.tpl.auth.registration.button')  }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>{{ __('core.panel.tpl.auth.registration.sign_up_fb')  }}</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>{{ __('core.panel.tpl.auth.registration.sign_in_gplus')  }}</a>
            </div>

            <a href="{{ route('Auth:Login') }}" class="text-center">{{ __('core.panel.tpl.auth.registration.already_member')  }}</a>
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





