{{-- $user->addons --}}
{{-- $user->plan->id --}}
@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }} );">
                <div class="container">
                    <div class="row m-0">
                        <div class="subscription-complete-wrapper">
                            <h3>{{__('auth/escorts-register-subscription-complete.title')}}</h3>
                            <div class="account-complete-wrapper">
                                {!! __('auth/escorts-register-subscription-complete.subscription_box', ['homeurl' => route('home'), 'contacturl' => route('contact.us') ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection