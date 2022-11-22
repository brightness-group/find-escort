@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
        <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> {{__('auth/escorts-register-subscription-pay.label')}}
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }});">
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-pay.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-pay.step_2_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-pay.step_3_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-pay.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pay-order-main">
                    <div class="container">
                        <div class="row m-0">
                            <h2>{{__('auth/escorts-register-subscription-pay.step_title')}}</h2>
                            <div class="pay-order-wrapper">
                                {!! __('auth/escorts-register-subscription-pay.pay_order_box') !!}
                                <div class="mob-fix-bottom">
                                    <a href="{{ route('escorts.register.subscription.complete') }}" class="btn">{{__('auth/escorts-register-subscription-pay.finalize')}}</a>
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