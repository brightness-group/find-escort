@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="login-main-section" style="background-image: url({{ asset('images/login-bg.jpg') }});">
                <div class="container">
                    <div class="row m-0">
                        <div class="login-wrapper">
                            <div class="login-box box-column">
                                <div class="login-box-inner">
                                    <h1 class="heading">{{__('auth/girls-access.label')}}</h1>

                                    @if (session('warning'))
                                        <div class="alert alert-warning">
                                            {{ session('warning') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <input type="hidden"  name="role" value="escort" />
                                        <div class="login-form-wrapper">
                                            <div class="form-field">
                                                <input type="email" placeholder="{{__('auth/girls-access.email')}}" name="email" value="{{ old('email') }}" required autofocus />
                                                @if($errors->login->has('email'))
                                                <span class="text-danger">{{$errors->login->first('email')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field">
                                                <input type="password" name="password" required placeholder="{{__('auth/girls-access.password')}}">
                                                @if($errors->login->has('password'))
                                                <span class="text-danger">{{$errors->login->first('password')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field checkbox-field">
                                                <input type="checkbox" name="remember" {{ old('remember') == 'on' ? 'checked' : '' }} id="remember">
                                                <label for="remember">{{__('auth/girls-access.remember_me')}}</label>
                                            </div>
                                            <div class="mob-swap">
                                                <div class="form-field submit-btn">
                                                    <input class="btn" type="submit" value="{{__('auth/girls-access.login')}}">
                                                </div>
                                                @if (Route::has('password.request'))
                                                <div class="forgot-link">
                                                    <a href="{{ route('password.request') }}" title="Forgot your password ?">{{__('auth/girls-access.forgot_your_password')}}</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="login-box my-account-box text-detail-box">
                                <div class="login-box-inner ">
                                    <div class="banner-text-section">
                                        {!! __('auth/girls-access.description') !!}
                                        <a class="btn btn-white" href="{{ route('escorts.register.information') }}">{{ __('auth/girls-access.create_my_ad') }}</a>
                                    </div>
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