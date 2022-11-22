<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-199955235-1">

        </script>

        <script>

          window.dataLayer = window.dataLayer || [];

          function gtag(){dataLayer.push(arguments);}

          gtag('js', new Date());

         

          gtag('config', 'UA-199955235-1');

        </script>
        
        @include('partials.meta')
        @include('partials.prologue')
        <link rel='stylesheet' href="{{ asset('plugins/intl-tel-input/css/intlTelInput.css') }}"  type='text/css' media='all' />
        <style type="text/css">
            .iti--allow-dropdown input, .iti--allow-dropdown input[type=text], .iti--allow-dropdown input[type=tel], .iti--separate-dial-code input, .iti--separate-dial-code input[type=text], .iti--separate-dial-code input[type=tel]{
                    padding-left: 85px !important;
                }
                .age-confirm-form-section .form-wrapper .privacy-wrapper label a {
                    text-decoration: none;
                    color: #FFFFFF;
                }
                .age-confirm-form-section .form-wrapper .privacy-wrapper label {
                    color: #FFFFFF;
                    padding-left: 26px;
                    font-size: 14px;
                    line-height: 17px;
                    letter-spacing: 0.11px;
                    position: relative;
                    cursor: pointer;
                }
        </style>
    </head>
    <body>
        @if(session()->has('success'))
            <!-- Complete Modal -->
                <div class="modal fade complete-modal" id="CompleteModal" tabindex="-1" role="dialog" aria-labelledby="CompleteModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                                <div class="success-icon"></div>    
                        </div>
                        <div class="modal-body">
                                <div class="popup-text-msg">
                                <p>Form submitted successfully.</p>
                                <p>A sales representative will contact you soon.</p>
                                </div>           
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn" data-dismiss="modal">Ok</button>
                            <a href="#" class="link">Policy Privacy Findher</a>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- Complete Modal -->
        @endif

        <section  class="coming-soon-age-section"  style="background-image: url({{ asset('images/coming-soon/bg.png' )}});">
            <div class="container">
                @php $locale = session()->get('locale'); @endphp
                <div class="coming-soon-confirm-your-age-wrapper">
                    <div class="header-language">
                        <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="{{route('home')}}/lang/en" @if($locale == "en") selected @endif>EN</option>
                            <option value="{{route('home')}}/lang/fr" @if($locale == "fr") selected @endif>FR</option>
                        </select>
                    </div>
                    <div class="coming-soon-confirm-your-age-header">
                        <h2 class="head-txt">{{__('coming-soon.heading')}}</h2>
                        <div class="row m-0">
                            <div class="logo">
                                <a href="{{ route('home') }}" title=""><img class="lazy" data-src="{{ asset('images/coming-soon/logo.png') }}" alt=""></a>
                                <p class="logo-sub-txt">{{__('coming-soon.logo-sub-text')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="coming-soon-confirm-your-age-text">
                        <div class="container">
                            <form method="" action="">
                                <div class="row m-0">
                                    <h2>{{__('coming-soon.confirm-age-label')}}</h2>
                                    <p>{{__('coming-soon.confirm-age-desc')}}</p>
                                    <div class="btn-group-cstm">
                                        <button type="button" id="ageYesBtn" class="btn btn-pink-white yesbtn">
                                            {{__('coming-soon.yes')}}
                                        </button>
                                        <button type="button" id="ageNoBtn" class="btn btn-pink-white nobtn">
                                            {{__('coming-soon.no')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="age-confirm-form-section" id="ageConfirmFromSec"  style="background-image: url({{ asset('images/coming-soon/bg-black.png') }});display:none;">
            <div class="container">
                <form method="POST" action="{{ route('coming.soon.register.form') }}">
                    @csrf
                    <div class="form-wrapper">
                        <div class="top-txt-wrp  text-center text-white">
                            <h4 class="h4-heading">{{__('coming-soon.form_heading')}}</h4>
                            <h5 class="h5-heading">{!! __('coming-soon.form_title') !!}</h5>
                            <p class="para-txt"> {!! __('coming-soon.form_desc') !!}</p>
                            <p class="para-txt"> {{__('coming-soon.form_sub_desc')}}</p>
                        </div>
                        <div class="form-style">
                            <div class="top-form-wrp">
                                <div class="row form-group ">
                                    <div class="top-f-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 pr-3 pr-md-4">
                                                <div class="f-group">
                                                    <input type="email" placeholder="Email" name="email" required class="form-input-boder-b" value="{{old('email')}}">
                                                </div>
                                                @if($errors->comingsoon->has('email'))
                                                <span class="text-danger">{{$errors->comingsoon->first('email')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pl-md-4 pl-3 ">
                                                <div class="f-group">
                                                    <input type="text" placeholder="Pseudo" name="username" required class="form-input-boder-b" value="{{old('username')}}">
                                                </div>
                                                @if($errors->comingsoon->has('username'))
                                                <span class="text-danger">{{$errors->comingsoon->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pr-3 pr-md-4">
                                                <div class="f-group">
                                                    <input type="password" name="password" placeholder="Password" required class="form-input-boder-b" value="{{old('password')}}">
                                                </div>
                                                @if($errors->comingsoon->has('password'))
                                                <span class="text-danger">{{$errors->comingsoon->first('password')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pl-md-4 pl-3">
                                                <div class="f-group">
                                                    <input id="birthday" type="text" name="birthday" value="{{ old('birthday') }}" placeholder="Birthday" autocomplete="off" class="form-input-boder-b">
                                                    <p id="age_number" style="display: none;"></p>
                                                </div>
                                                @if($errors->comingsoon->has('birthday'))
                                                <span class="text-danger">{{$errors->comingsoon->first('birthday')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pr-3 pr-md-4">
                                                <div class="f-group">
                                                    <input type="password" name="password_confirmation" required placeholder="Confirm Password" value="{{old('password-confirmation')}}" class="form-input-boder-b">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-md-4 pl-3">
                                                <div class="f-group">
                                                    <label for="" class="lable-s">Location</label>
                                                    <select class="form-input-boder-b select-input" required name="location">
                                                        @foreach ($cities As $key => $value)
                                                        <option value="{{$value->name}}" @if (old('location') == $value->name) selected @endif>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-txt"></div>
                                                </div>
                                                @if($errors->comingsoon->has('location'))
                                                <span class="text-danger">{{$errors->comingsoon->first('location')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pr-3 pr-md-4">
                                                <div class="f-group">
                                                    <input type="text" name="phone" id="phone" required style="padding-left: 52px;" placeholder="{{__('coming-soon.swiss_mobile_phone')}}" value="{{old('phone')}}" class="form-input-boder-b">
                                                </div>
                                                @if($errors->comingsoon->has('phone'))
                                                <span class="text-danger">{{$errors->comingsoon->first('phone')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 pl-md-4 pl-3">
                                                <div class="f-group">
                                                    <label for="" class="lable-s">Gender</label>
                                                    <select class="form-input-boder-b select-input" required name="gender" id="genderselect">
                                                        <option value="Female" @if (old('gender') == 'Female') selected @endif>Female</option>
                                                        <option value="Transgender" @if (old('gender') == 'Transgender') selected @endif>Transgender</option>
                                                    </select>
                                                    <div class="help-txt"></div>
                                                </div>
                                                @if($errors->comingsoon->has('gender'))
                                                <span class="text-danger">{{$errors->comingsoon->first('gender')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Hair Color</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="hair_color" name="hair_color">
                                                    @foreach ($hair_colors As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('hair_color') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('hair_color'))
                                            <span class="text-danger">{{$errors->comingsoon->first('hair_color')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Hair Length</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="hair_length" name="hair_length">
                                                    @foreach ($hair_length As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('hair_length') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('hair_length'))
                                            <span class="text-danger">{{$errors->comingsoon->first('hair_length')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Boobs</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="boob" name="boob">
                                                    @foreach ($boobs As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('boob') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('boob'))
                                            <span class="text-danger">{{$errors->comingsoon->first('boob')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Activity</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="activity" name="activity">
                                                    @foreach ($activities As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('activity') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('activity'))
                                            <span class="text-danger">{{$errors->comingsoon->first('activity')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Nationality</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="country" name="country">
                                                    @foreach ($countries As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('country', 'Switzerland') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('country'))
                                            <span class="text-danger">{{$errors->comingsoon->first('country')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Height</label>
                                            <div class="col-md-8 pl-md-0">
                                                <input class="cstm-select" type="text" name="height" required id="height" value="{{old('height')}}">
                                            </div>
                                            @if($errors->comingsoon->has('height'))
                                            <span class="text-danger">{{$errors->comingsoon->first('height')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Body</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="body" name="body">
                                                    @foreach ($bodies As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('body') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('body'))
                                            <span class="text-danger">{{$errors->comingsoon->first('body')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Eyes Color</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="eyes_color" name="eyes_color">
                                                    @foreach ($eyes_colors As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('eyes_color') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('eyes_color'))
                                            <span class="text-danger">{{$errors->comingsoon->first('eyes_color')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Ethnicity</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="ethnicity" name="ethnicity">
                                                    @foreach ($ethnicity As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('ethnicity') == $value->name) selected @endif>{{ ucfirst($value->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('ethnicity'))
                                            <span class="text-danger">{{$errors->comingsoon->first('ethnicity')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Cup size</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="cup_size" name="cup_size">
                                                    @foreach ($cup_size As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('cup_size') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('cup_size'))
                                            <span class="text-danger">{{$errors->comingsoon->first('cup_size')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Pubic hair</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="pubic_hair" name="pubic_hair">
                                                    @foreach ($pubic_hair As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('pubic_hair') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('pubic_hair'))
                                            <span class="text-danger">{{$errors->comingsoon->first('pubic_hair')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Provide service for</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="client" name="client">
                                                    @foreach ($clients As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('client') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('client'))
                                            <span class="text-danger">{{$errors->comingsoon->first('client')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Smoke</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="smoke" name="smoke">
                                                    @foreach ($smoke As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('smoke') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('smoke'))
                                            <span class="text-danger">{{$errors->comingsoon->first('smoke')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Tattoos / Piercing</label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" id="tattoo" name="tattoo">
                                                    @foreach ($tattoos As $key => $value)
                                                    <option value="{{$value->name}}" @if (old('tattoo') == $value->name) selected @endif>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->comingsoon->has('tattoo'))
                                            <span class="text-danger">{{$errors->comingsoon->first('tattoo')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row form-group ">
                                    <div class="col-md-12">
                                        <div class="row textarra-field">
                                            <label for="" class="col-md-2 cstm-lbl">About Me <small class="small-txt-lable">(130 characters)</small></label>
                                            <div class="col-md-10 pl-md-0">
                                                <div class="text-area-group">
                                                    <textarea  minlength="130" name="bio"  class="cstm-form-control cstm-txtarea" id="bio" placeholder="Type your text here…." cols="30" rows="10">{!! old('bio') !!}</textarea>
                                                    <span class="small-chare-count-txt"> <span id="chars"></span>  characters remaining</span>
                                                </div>
                                                @if($errors->comingsoon->has('bio'))
                                                <span class="text-danger">{{$errors->comingsoon->first('bio')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group  clone_language_data">
                                    @for ($i = 1; $i < 2; $i++)
                                    <div class="col-md-6 clone_count clone_language_this_{{$i}}">
                                        <div class="row">
                                            <label for="" class="col-md-4 cstm-lbl">Language {{$i}}   </label>
                                            <div class="col-md-8 pl-md-0">
                                                <select class="cstm-select" name="languages[]">
                                                    @foreach ($alllanguages As $key => $value)
                                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                                <a href="#" class='add-link-btn add_language_section'>Add</a>
                            </div>

                            <div class="mobility-form-row">
                                <label>Your Mobility</label>
                                <div class="checkbox-field">
                                    <input type="checkbox" name="mobility[]" @if(old('mobility') && in_array('Incall', old('mobility'))) checked @endif  value="Incall" id="m1">
                                    <label for="m1">Incall</label>
                                </div>
                                <div class="checkbox-field">
                                    <input type="checkbox" name="mobility[]" @if(old('mobility') && in_array('Outcall', old('mobility'))) checked @endif value="Outcall" id="m2">
                                    <label for="m2">Outcall</label>
                                </div>
                                @if($errors->comingsoon->has('mobility'))
                                <span class="text-danger">{{$errors->comingsoon->first('mobility')}}</span>
                                @endif
                            </div>
                            
                            <div class="select-speciality-wrapper">
                                <h4>Select Specialities</h4>
                                @if($errors->comingsoon->has('specialities'))
                                <span class="text-danger">{{$errors->comingsoon->first('specialities')}}</span>
                                @endif
                                <div class="select-speciality-checkbox">
                                    @foreach ($specialities->chunk(10) As $specialities_chunk)
                                    
                                        @foreach ($specialities_chunk As $key => $value)
                                        <div class="checkbox-field">
                                            <input type="checkbox" class="specialities" id="specialities-{{$value->id}}" value="{{$value->name}}" name="specialities[]" @if(old('specialities') && in_array($value->name, old('specialities'))) checked @endif data-label="{{$value->name}}">
                                            <label for="specialities-{{$value->id}}">{{$value->name}}</label>
                                        </div>
                                        @endforeach
                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="privacy-wrapper">
                            <p>{{__('coming-soon.sales_representative')}}</p>
                            <div class="">
                                <input type="checkbox" name="young" @if(old('young') == 1) checked @endif required value="1" id="showGirlsMyLocation">
                                <label required for="showGirlsMyLocation">{!! __('coming-soon.privacy_policy') !!} </label>
                            </div>
                            <div class="recaptch-block">{!!  GoogleReCaptchaV3::renderField('register_id','register') !!}</div>
                           
                            @if($errors->comingsoon->has('g-recaptcha-response'))
                            <span class="text-danger">{{$errors->comingsoon->first('g-recaptcha-response')}}</span>
                            @endif
                            <button type="submit" class="btn">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <div class="conatct-us-footer-section">
            <div class="container">
                <div class="foot-logo">
                    <a href="{{ route('home') }}" title=""><img class="lazy" data-src="{{ asset('images/coming-soon/logo.png') }}" alt=""></a>
                </div>
                <div class=" text-center">
                    <h4 class="heading-wth-icon">{{__('coming-soon.contact_us')}}</h4>
                </div>
                <form method="POST" action="{{ route('coming.soon.contact.form') }}" class="contact-form-style">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" required placeholder="Pseudo" name="username" class="input-style-border">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" required placeholder="Email" name="email" class="input-style-border">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-0 pl-3">
                            <div class="form-group">
                                <textarea name="message" required placeholder="Message" id="msg" name="message" class="input-style-border text-area-s"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center recaptcha-with-btn">
                            {!!  GoogleReCaptchaV3::renderField('contact_us_id','contact_us') !!}
                            @error('g-recaptcha-response')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="btn">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer-bottom">
            <div class="container">
                <div class="site-info">
                    <p>Copyright © 2021. FindHer. All Rights Reserved</p>
                </div>
                <!-- close .site-info -->
            </div>
        </footer>
    </body>
    @include('partials.epilogue')
    <script type='text/javascript' src="{{asset('js/jquery.inputmask.bundle.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/jquery.rateit.min.js')}}"></script>
    <script type='text/javascript' src="{{ asset('plugins/intl-tel-input/js/intlTelInput.min.js') }}"></script>
    <script type="text/javascript">
        $ = jQuery;

        @if($errors->comingsoon->count() > 0)
           $(function() {
                jQuery('#ageConfirmFromSec').show();
                jQuery('html, body').animate({
                    scrollTop: jQuery("#ageConfirmFromSec").offset().top
                }, 1000);
            });    
        @endif

            
        jQuery(document).ready(function(){

            $('#CompleteModal').modal('show')
            
            jQuery('.yesbtn').click(function() {
                jQuery('#ageConfirmFromSec').show();
                jQuery('html, body').animate({
                    scrollTop: jQuery("#ageConfirmFromSec").offset().top
                }, 1000);
            });

            jQuery('.nobtn').click(function() {
                jQuery('#ageConfirmFromSec').hide();

            });
        });


        jQuery(document).ready(function(){
            jQuery("#height").inputmask({"mask": "9M99"});

            $('.add_language_section').click(function(e){
                e.preventDefault();

                $('.clone_language_this_1')
                .clone()
                .removeClass('clone_language_this_1')
                .html(function(i, oldHTML) {
                    return oldHTML.replace('Language 1', 'Language ' + ($('.clone_count').length + 1) );
                })
                .appendTo('.clone_language_data');
            });
        });

        (function($) {
            $.fn.extend( {
                limiter: function(limit, elem) {
                    $(this).on("keyup focus", function() {
                        setCount(this, elem);
                    });
                    function setCount(src, elem) {
                        var chars = src.value.length;
                        if (chars > limit) {
                            //src.value = src.value.substr(0, limit);
                            chars = limit;
                        }
                        elem.html( limit - chars );
                    }
                    setCount($(this)[0], elem);
                }
            });
        })(jQuery);

        var elem = $("#chars");
        $("#bio").limiter(130, elem);

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
    {!!  GoogleReCaptchaV3::init() !!}
</html>
