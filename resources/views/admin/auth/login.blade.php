@extends('admin.layout')

@section('body-class', 'hold-transition login-page')

@section('body-content')

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ route('IndexPage') }}">{!! __('core.panel.tpl.main.site_name_html')  !!}</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">{{ __('core.panel.tpl.auth.login.msg') }}</p>

            <form action="{{ route('Auth:Login') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback ' }} ">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           placeholder="{{ __('core.email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : 'has-feedback ' }} ">
                    <input id="password" type="password" class="form-control" name="password"
                           placeholder="{{ __('core.password') }}" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('core.panel.tpl.auth.login.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ __('core.sign_in') }}</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- {{ __('core.or') }} -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat btn-disabled"><i
                            class="fa fa-facebook"></i> {{ __('core.panel.tpl.auth.login.sign_in_fb') }}</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat btn-disabled"><i
                            class="fa fa-google-plus"></i> {{ __('core.panel.tpl.auth.login.sign_in_gplus') }}</a>
            </div>

            <a href="{{ route('Auth:PasswordReset') }}">{{ __('core.panel.tpl.auth.login.forgot_pwd') }}</a><br>
            <a href="{{ route('Auth:Registration') }}"
               class="text-center">{{ __('core.panel.tpl.auth.login.registration') }}</a>
        </div>
    </div>

@endsection