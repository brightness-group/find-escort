@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> Create Escort Ad
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }} );">
                
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-addons.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-addons.step_2_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-addons.step_3_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-subscription-addons.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('escorts.register.subscription.addons') }}">
                    @csrf
                    @error('subscription_addons')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="choose-your-plan">
                        <div class="container">
                            <div class="row m-0">
                                <h2 class="d-md-block d-none">{{__('auth/escorts-register-subscription-addons.title')}}</h2>
                                <div class="subscription-boost-wrapper">
                                    <div class="step-title-name">{{__('auth/escorts-register-subscription-addons.boost_your_ad')}}</div>
                                    <div class="more-detail mob-more-detail d-md-none d-block">
                                                <span>{{__('auth/escorts-register-subscription-addons.more_details')}}</span>
                                            </div>
                                    <div class="subscription-boost-box">
                                        <div class="subscription-boost-box-inner">
                                            {!! __('auth/escorts-register-subscription-addons.boost_ad_html') !!}
                                            <div class="boost-duration">
                                                @foreach ($addon_types->slice(0, 1) As $key => $value)
                                                    @foreach ($value->addons As $key => $addon)
                                                        <div class="checkbox-field">
                                                            <input type="radio" name="booster" value="{{$addon->id}}" id="addon-{{$addon->id}}" @if(Auth::user()->isFreeBooster($addon->id)) checked @endif>
                                                            <label for="addon-{{$addon->id}}">
                                                                {{$addon->name}} - {{$addon->duration}} Week(s)

                                                                @if(Auth::user()->isFreeBooster($addon->id))
                                                                    <span> <small class="mob-dash">-</small> <strike>{{$addon->price}} {{$addon->currency}}</strike> {{__('auth/escorts-register-subscription-addons.free')}}</span>
                                                                @else
                                                                    <span> <small class="mob-dash">-</small> {{$addon->price}} {{$addon->currency}}</span>
                                                                @endif
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="more-detail d-md-block d-none">
                                                <span>{{__('auth/escorts-register-subscription-addons.more_details')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subscription-boost-box boost-box-white">
                                        <div class="subscription-boost-box-inner">
                                            <p>{{__('auth/escorts-register-subscription-addons.display_your_ad')}}</p>
                                            @foreach ($addon_types->slice(1, 2) As $key => $value)
                                                <div class="regional-checkbox">
                                                    <h4 class="d-md-block d-none">{{$value->name}}</h4>
                                                    @foreach ($value->addons As $key => $addon)
                                                        <div class="checkbox-field">
                                                            <input type="radio" name="smile" value="{{$addon->id}}" id="addon-{{$addon->id}}">
                                                            <label for="addon-{{$addon->id}}">
                                                           <span class="d-md-none d-inline-block">{{$value->name}} -</span> {{$addon->duration}} week(s) - {{$addon->price}} <small class="mob-dash">-</small> {{$addon->currency}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            <div class="more-detail d-md-block d-none">
                                                <span>{{__('auth/escorts-register-subscription-addons.more_details')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="plan-button-box">
                                    <div class="mob-fix-bottom">
                                    <button type="submit" class="btn">{{__('auth/escorts-register-subscription-addons.next')}}</button>
                                    <a class="btn" href="{{ route('escorts.register.subscription.reviews') }}" title="SKIP BOOST">{{__('auth/escorts-register-subscription-addons.skip_boost')}}</a>
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

@include('modals.boost')

@endsection
@section('js')
<script type="text/javascript">
    $ = jQuery;
    $('.subscription-boost-wrapper .more-detail').on('click', function(){
        $(".boost-more-detail-popup").show();        
    });
    $('.boost-more-detail-popup .btn').on('click', function(){
        $(".boost-more-detail-popup").hide();        
    });

    $('body').click(function(e) {
        if (!$(e.target).closest('.boost-more-detail-popup-bg').length && !$(e.target).closest('.subscription-boost-wrapper .more-detail').length ){
            $(".boost-more-detail-popup").hide();
        }
    });
</script>
@endsection
