@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> {{__('auth/escorts-register-subscription.label')}}
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }});">
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription.step_2_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription.step_3_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('escorts.register.subscription') }}">
                    @csrf
                    <div class="choose-your-plan">
                    <div class="step-title-name">{{__('auth/escorts-register-subscription.step_title')}}</div>
                        <div class="container">
                            <div class="row m-0">
                                <h2>{{__('auth/escorts-register-subscription.choose_your_plan')}}</h2>
                                <div class="choose-your-plan-inner">
                                    @error('subscription')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @foreach ($plans As $key => $plan)
                                    <div class="choose-your-plan-box">
                                        <div class="choose-your-plan-box-inner">
                                            <h3>{{$plan->name}} <span class="mob-week"> <small class="mob-dash">-</small> {{$plan->duration}} week(s)</span> <span class="mob-price">  <small class="mob-dash">-</small> {{$plan->price}} {{$plan->currency}}</span></h3>
                                            <p>{!! $plan->description !!}</p>
                                            <div class="plan-price mob-none">{{$plan->price}} {{$plan->currency}}</div>
                                            <div class="input-radio-btn-group"> 
                                                <input type="radio" name="subscription" value="{{$plan->id}}" id="plan-{{$plan->id}}">
                                                <label class="btn" for="plan-{{$plan->id}}"><b>{{__('auth/escorts-register-subscription.select')}}</b></label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    @endforeach    
                                </div>
                                <div class="plan-button-box">
                                    <div class="mob-fix-bottom">
                                        <button type="submit" class="btn">{{__('auth/escorts-register-subscription.next')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection