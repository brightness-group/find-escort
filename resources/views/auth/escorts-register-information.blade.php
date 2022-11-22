@extends('master')

@section('css')
<link rel='stylesheet' href="{{ asset('css/bootstrap-datepicker.css') }}" type='text/css' media='all' />
<link rel='stylesheet' href="{{ asset('plugins/intl-tel-input/css/intlTelInput.css') }}"  type='text/css' media='all' />
@endsection

@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }});">
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-information.step_1_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-information.step_2_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-information.step_3_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-information.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('escorts.register.information') }}">
                    @csrf
                    <div class="information-form-wrapper">
                        <div class="step-title-name">{{__('auth/escorts-register-information.title')}}</div>
                        <div class="form-inner-bg">
                            <div class="form-field half">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="{{__('auth/escorts-register-information.name')}}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field half">
                                <input type="text" name="username" value="{{ old('username') }}" placeholder="{{__('auth/escorts-register-information.pseudo')}}">
                                @error('username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field half">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{__('auth/escorts-register-information.email')}}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field select-field half">
                                <label for="birthday">Birthday</label>
                                <input id="birthday" type="text" name="birthday" value="{{ old('birthday') }}" placeholder="dd/mm/yyyy" autocomplete="off">
                                <!--<input type="input" class="form-control" id="inputDate">-->
                                <p id="age_number" style="display: none;"></p>
                                @error('birthday')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field half">
                                <input type="password" name="password" placeholder="{{__('auth/escorts-register-information.password')}}">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-field half">
                                <input type="password" name="password_confirmation" placeholder="{{__('auth/escorts-register-information.confirm_password')}}">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field select-field half">
                                <label>{{__('auth/escorts-register-information.gender')}}</label>
                                <select id="gender" name="gender">
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{__('auth/escorts-register-information.female')}}</option>
                                <option value="transgender" {{ old('gender') == 'transgender' ? 'selected' : '' }}>{{__('auth/escorts-register-information.transgender')}}</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field half">
                                <input type="text" name="phone" value="{{ old('phone') }}"  id="phone" placeholder="{{__('auth/escorts-register-information.phone')}}">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field checkbox-field text-center">
                                <input type="checkbox" name="adult" {{ old('adult') == 'on' ? 'checked' : '' }} id="adult">
                                <label for="adult">{{__('auth/escorts-register-information.confirm_age')}}</label>
                                @error('adult')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="privacy-wrapper">
                            <div class="form-field checkbox-field">
                                <input type="checkbox" name="terms_and_conditions"  {{ old('terms_and_conditions') == 'on' ? 'checked' : '' }} id="terms_and_conditions">
                                <label for="terms_and_conditions">{!! __('auth/escorts-register-information.privacy_policy', ['url' =>  url(App\Models\Page::find(3)->slug) ]) !!}</label>
                                @error('terms_and_conditions')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mob-fix-bottom">
                                <button type="submit" class="btn">{{__('auth/escorts-register-information.continue')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type='text/javascript' src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script type='text/javascript' src="{{ asset('plugins/intl-tel-input/js/intlTelInput.min.js') }}"></script>
<script>

$ = jQuery;

var phone = window.intlTelInput(document.querySelector("#phone"), {
  separateDialCode: true,
  preferredCountries:["ch"],
  hiddenInput: "phone",
  utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

$("form").submit(function() {
  var full_number = phone.getNumber(intlTelInputUtils.numberFormat.E164);
$("input[name='phone[phone]'").val(full_number);
});
</script>
@endsection