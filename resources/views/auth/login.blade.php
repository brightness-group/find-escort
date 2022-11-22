@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="login-main-section" style="background-image: url({{ asset('images/login-bg.jpg') }});">
                <div class="container">
                    <div class="row m-0">
                        <div class="login-wrapper">
                            <div class="login-box">
                                <div class="login-box-inner">
                                    <h3>{{__('auth/login.label')}}</h3>
                                    @if (session('warning'))
                                        <div class="alert alert-warning">
                                            {{ session('warning') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <input type="hidden"  name="role" value="customer" />
                                        <div class="login-form-wrapper">
                                            <div class="form-field">
                                                <input type="email" placeholder="{{__('auth/login.email')}}" name="email" value="{{ old('email') }}" required autofocus />
                                                @if($errors->login->has('email'))
                                                <span class="text-danger">{{$errors->login->first('email')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field">
                                                <input type="password" name="password" required placeholder="{{__('auth/login.password')}}">
                                                @if($errors->login->has('password'))
                                                <span class="text-danger">{{$errors->login->first('password')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field checkbox-field">
                                                <input type="checkbox" name="remember" {{ old('remember') == 'on' ? 'checked' : '' }} id="remember">
                                                <label for="remember">{{__('auth/login.remember_me')}}</label>
                                            </div>
                                            <div class="mob-swap">
                                            <div class="form-field submit-btn">
                                                <input class="btn" type="submit" value="{{__('auth/login.login')}}">
                                            </div>
                                            @if (Route::has('password.request'))
                                            <div class="forgot-link">
                                                <a href="{{ route('password.request') }}" title="{{__('auth/login.forgot_password')}}">{{__('auth/login.forgot_password')}}</a>
                                            </div>
                                            @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="login-box my-account-box">
                                <div class="login-box-inner">
                                    <h3>{{__('auth/login.create_account_as_member')}}</h3>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="login-form-wrapper">
                                            <div class="form-field">
                                                <input type="email" name="email" value="{{ old('email') }}" required placeholder="{{__('auth/login.email')}}">
                                                @if($errors->register->has('email'))
                                                <span class="text-danger">{{$errors->register->first('email')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-field">
                                                <input type="text" name="username" value="{{ old('username') }}" required placeholder="{{__('auth/login.pseudo')}}">
                                                @if($errors->register->has('username'))
                                                <span class="text-danger"> {{$errors->register->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-field">
                                                <input type="password" name="password" required  placeholder="{{__('auth/login.password')}}">
                                                @if($errors->register->has('password'))
                                                <span class="text-danger"> {{$errors->register->first('password')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-field checkbox-field">
                                                <input type="checkbox" name="terms_and_conditions" {{ old('terms_and_conditions') == 'on' ? 'checked' : '' }} id="t1">
                                                <label for="t1">{{__('auth/login.terms_and_conditions')}}</label>
                                                @if($errors->register->has('terms_and_conditions'))
                                                <span class="text-danger"> {{$errors->register->first('terms_and_conditions')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-field submit-btn">
                                                <input class="btn" type="submit" value="{{__('auth/login.subscription')}}">
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