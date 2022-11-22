@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="login-main-section forgot-pass-box" style="background-image: url({{ asset('images/login-bg.jpg')}});">
                <div class="container">
                    <div class="row m-0">
                        <div class="login-wrapper">
                            <div class="login-box" style="width: 100%">
                                <div class="login-box-inner">
                                    <h3>{{__('auth/forgot-password.label')}}</h3>
                                    <p class="p-top-txt">{{__('auth/forgot-password.description')}}</p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="login-form-wrapper">
                                            <div class="form-field">
                                                <input type="email" placeholder="{{__('auth/forgot-password.email')}}" name="email" required autofocus />
                                                @if($errors->has('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                                @endif    
                                            </div>
                                            <div class="form-field submit-btn">
                                                <input class="btn" type="submit" value="{{__('auth/forgot-password.button')}}">
                                            </div>
                                        </div>
                                    </form>
                                    <p class="p-bottom-txt">{{__('auth/forgot-password.bottom_description')}}</p>
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