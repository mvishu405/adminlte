@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}">{{ Adminlte::getAppName() }}</a>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg"> Sign in to start your session </p>
                <login-form></login-form>
                <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
                <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
            </div>

        </div>
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
    </body>

@endsection
