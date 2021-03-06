@extends('admin.layout')

@section('body-class', 'hold-transition login-page')

@section('body-content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('IndexPage') }}">{!! __('core.panel.tpl.main.site_name_html')  !!}</a>
        </div>
        <div class="login-box-body"><p class="login-box-msg">{{ __('core.panel.tpl.auth.reset.msg')  }} </p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ route('Auth:PasswordResetAction') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" placeholder="{{ __('core.email')  }}" name="email" value="{{ old('email') }}" class="form-control" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('core.panel.tpl.auth.reset.button')  }}
                        </button>
                    </div>
                </div>

            </form>
            <a href="https://demo.adminlte.acacha.org/login">{{ __('core.sign_in')  }}</a><br>
            <a href="https://demo.adminlte.acacha.org/register" class="text-center">{{ __('core.panel.tpl.auth.registration.msg')  }}</a>
        </div>
    </div>
@endsection
