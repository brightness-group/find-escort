@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="login-main-section" style="background-image: url({{ asset('images/login-bg.jpg') }});">
                <div class="container">
                    <div class="row m-0">
                        <div class="login-wrapper">
                            <div class="login-box" style="width: 100%">
                                <div class="login-box-inner">
                                    <h3>{{__('auth/reset-password.label')}}</h3>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <div class="login-form-wrapper">
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">   
                                            @if($errors->has('token'))
                                            <span class="text-danger">{{$errors->first('token')}}</span>
                                            @endif    
                                            <div class="form-field">
                                                <input type="email" placeholder="{{__('auth/reset-password.email')}}" name="email" required autofocus />
                                                @if($errors->has('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field">
                                                <input type="password" name="password" required placeholder="{{__('auth/reset-password.password')}}">
                                                @if($errors->has('password'))
                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field">
                                                <input type="password" name="password_confirmation" required placeholder="{{__('auth/reset-password.confirm_password')}}">
                                                @if($errors->has('password_confirmation'))
                                                <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field submit-btn">
                                                <input class="btn" type="submit" value="{{__('auth/reset-password.button')}}">
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
    </div>
</div>
@endsection