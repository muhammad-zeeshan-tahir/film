



@extends('layouts.signup')

@section('content')

    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">

                <div class="auth-box">
                    <div class="top">
                        <img src="{{ asset ('public/assets/images/logo-white.svg') }}" alt="Lucid">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Account Signin</p>
                            <p>
                                @if (Session::has('flash_message'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <i class="fa fa-check-circle"></i>

                                        {{ Session::get('flash_message') }}

                                    </div>
                                @endif
                            </p>
                        </div>
                        <div class="body">
                            {!! Form::model([], ['url' => url('frontend/film/signin/attenticate', []),'class'=>'form-auth-small' , 'files'=> true, 'method'=>'post']) !!}

                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">Email</label>
                                <input name="email" type="text" class="form-control" id="signup-email" placeholder="Your Email">
                                {{$errors->getBag('default')->first('email')}}
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">Password</label>
                                <input name="password" type="password" class="form-control" id="signup-password" placeholder="Your Password">
                                {{$errors->getBag('default')->first('password')}}
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">login</button>
                            <div class="bottom">
                                <span class="helper-text">Create an account? <a href="{{url('frontend/film/login')}}">Login</a></span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')


@endsection
