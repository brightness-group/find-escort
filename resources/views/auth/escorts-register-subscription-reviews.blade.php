@extends('master')
@section('css')
<style type="text/css">
button.btn.pay-card {
    max-width: 257px;
    width: 100%;
    margin: 18px auto 0;
    height: 50px;
    padding: 0 5px;
    border: none;
    outline: none;
    font-size: 16px;
    box-shadow: 0 3px 6px 0 rgb(0 0 0 / 16%);
    line-height: 50px;
}
</style>
@endsection
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> {{__('auth/escorts-register-subscription-reviews.label')}}
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }});">
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-reviews.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-reviews.step_2_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-reviews.step_3_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-reviews.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="valid-plan-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            @php
                            $totalPrice = $user->plan->price;
                            @endphp
                            <h2>{{__('auth/escorts-register-subscription-reviews.step_title')}} : {{$user->plan->name}}</h2>
                            <div class="valid-plan-box-wrapper">
                                <div class="valid-plan-box">
                                    <div class="valid-plan-box-inner">
                                        <table>
                                            <tr>
                                                <th>{{__('auth/escorts-register-subscription-reviews.product')}}</th>
                                                <th>{{__('auth/escorts-register-subscription-reviews.price')}}</th>
                                            </tr>
                                            <tr>
                                                <td>{{__('auth/escorts-register-subscription-reviews.plan')}} {{$user->plan->name}} - {{$user->plan->duration}} {{$user->plan->interval}}</td>
                                                <td>{{$user->plan->price}}.-</td>
                                            </tr>
                                            @foreach($user->addons As $key => $addon)
                                            <tr>
                                                <td>Boost {{$addon->name}} - {{$addon->duration}} {{$addon->interval}}</td>
                                                @if(Auth::user()->isFreeBooster($addon->id))
                                                    <td>0.-</td>
                                                @else
                                                    <td>{{$addon->price}}.-</td>

                                                    @php
                                                        $totalPrice +=  $addon->price;
                                                    @endphp
                                                @endif
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2"><img class="lazy" data-src="{{ asset('images/table-border.svg') }}" alt=""></td>
                                            </tr>
                                            <tfoot>
                                                <tr>
                                                    <td>{{__('auth/escorts-register-subscription-reviews.totla_price')}}</td>
                                                    <td>{{$totalPrice}}.-</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span class="tax">{{__('auth/escorts-register-subscription-reviews.tva_included')}}</span></td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="paycard-button">
                                            <a class="btn pay-card" href="{{ route('escorts.register.subscription.pay', 'card') }}" title="{{__('auth/escorts-register-subscription-reviews.pay_by_card')}}">{{__('auth/escorts-register-subscription-reviews.pay_by_card')}}</a>
                                            <a class="btn pay-cash" href="{{ route('escorts.register.subscription.pay', 'cash') }}" title="{{__('auth/escorts-register-subscription-reviews.pay_by_cash')}}">{{__('auth/escorts-register-subscription-reviews.pay_by_cash')}}</a>
                                            <a class="btn pay-finance" href="{{ route('escorts.register.subscription.pay', 'post') }}" title="{{__('auth/escorts-register-subscription-reviews.pay_by_post_finanace')}}">{{__('auth/escorts-register-subscription-reviews.pay_by_post_finanace')}}</a>
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
</div>
@endsection
