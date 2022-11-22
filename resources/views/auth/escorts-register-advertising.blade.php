@extends('master')
@section('css')
<style type="text/css">
    .clone_this, .clone_data{
    width: 100%;
    }
</style>
@endsection

@php
$canton = array(
        'Genève',
        'Vaud',
        'Valais',
        'Neuchâtel',
        'Jura',
        'Fribourg',
        'Berne',
        'Zürich',
        'Argovie',
        'Bâle',
        'Lucerne',
        'Glaris',
        'Saint-Gall',
        'Soleure'
        );
@endphp

@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> {{__('auth/escorts-register-advertising.label')}}
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }} );">
                
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-advertising.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-advertising.step_2_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-advertising.step_3_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-advertising.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('escorts.register.advertising') }}">
                    @csrf
                    <div class="information-form-wrapper advertising-form-wrapper">
                        <div class="step-title-name">{{__('auth/escorts-register-advertising.title')}}</div>
                        <p>{{__('auth/escorts-register-advertising.description')}}</p>
                        <div class="form-inner-bg">
                            <div class="advertisment-form-left">
                                <div class="top-form-wrp">
                                    <div class="row form-group w-100">
                                        
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.hair_color')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">
                                                    <select class="cstm-select" id="hair_color_id" name="hair_color_id">
                                                        @foreach ($hair_colors As $key => $value)
                                                        @if (old('hair_color_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                        @error('hair_color_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.hair_length')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">
                                                        <select class="cstm-select" id="hair_length_id" name="hair_length_id">
                                                            @foreach ($hair_length As $key => $value)
                                                            @if (old('hair_length_id') == $value->id)
                                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                            @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('hair_length_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.canton')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">
                                                        <select class="cstm-select" id="state_id" name="state_id">
                                                            @foreach ($states As $key => $value)

                                                                @php if(!in_array($value->name, $canton)) {continue;}@endphp

                                                                @if (old('state_id') == $value->id)
                                                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                                @else
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                           @error('state_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.location')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">
                                                    <select class="cstm-select" id="city_id" name="city_id">
                                                        <option value="" data-stateid = '0'>{{__('auth/escorts-register-advertising.select_location')}}</option>
                                                        @foreach ($cities As $key => $value)
                                                        @if (old('city_id') == $value->id)
                                                        <option value="{{$value->id}}" data-stateid = '{{$value->state->id}}' selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}" data-stateid = '{{$value->state->id}}'>{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                      @error('city_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.nationality')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">
                                                    <select class="cstm-select" id="country_id" name="country_id">
                                                        @foreach ($countries As $key => $value)
                                                        @if ((old('country_id', 212) == $value->id))
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('country_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.height')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">
                                                    <input class="cstm-select" type="text" name="height" id="height" value="{{ old('height') }}">
                                                    @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.body')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">
                                                        <select class="cstm-select" id="body_id" name="body_id">
                                                            @foreach ($bodies As $key => $value)
                                                            @if (old('body_id') == $value->id)
                                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                            @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                         @error('body_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                           
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.eyes_color')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">    
                                                        <select class="cstm-select" id="eyes_color_id" name="eyes_color_id">
                                                            @foreach ($eyes_colors As $key => $value)
                                                            @if (old('eyes_color_id') == $value->id)
                                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                            @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('eyes_color_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.ethnicity')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">    
                                                <select class="cstm-select" id="ethnicity_id" name="ethnicity_id">
                                                        @foreach ($ethnicity As $key => $value)
                                                        @if (old('ethnicity_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{ ucfirst($value->name) }}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{ ucfirst($value->name) }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('ethnicity_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.cup_size')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">       
                                                <select class="cstm-select" id="cup_size_id" name="cup_size_id">
                                                        @foreach ($cup_size As $key => $value)
                                                        @if (old('cup_size_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                  @error('cup_size_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                              
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.pubic_hair')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">         
                                                <select class="cstm-select" id="pubic_hair_id" name="pubic_hair_id">
                                                        @foreach ($pubic_hair As $key => $value)
                                                        @if (old('pubic_hair_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                           @error('public_hair_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                </div>
                                         
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.provid_service_for')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">   
                                                <select class="cstm-select" id="client_id" name="client_id">
                                                        @foreach ($clients As $key => $value)
                                                        @if (old('client_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('client_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.smoke')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">      
                                                    <select class="cstm-select" id="smoke_id" name="smoke_id">
                                                            @foreach ($smoke As $key => $value)
                                                            @if (old('smoke_id') == $value->id)
                                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                            @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('smoke_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>

                                                </div>
                                              
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.tattoos')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="field-wrp">  
                                                <select class="cstm-select" id="tattoo_id" name="tattoo_id">
                                                        @foreach ($tattoos As $key => $value)
                                                        @if (old('tattoo_id') == $value->id)
                                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                        @else
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('tattoo_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.activity')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">   
                                                        <select class="cstm-select" id="activity_id" name="activity_id">
                                                                @foreach ($activities As $key => $value)
                                                                @if (old('activity_id') == $value->id)
                                                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                                @else
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                             @error('activity_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.boobs')}}</label>
                                                <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                    <div class="field-wrp">
                                                        <select class="cstm-select" id="boob_id" name="boob_id">
                                                            @foreach ($boobs As $key => $value)
                                                            @if (old('boob_id') == $value->id)
                                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                                            @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                           @error('boob_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100">
                                        <div class="col-md-12">
                                            <div class="row textarra-field">
                                                <label for="" class="col-md-2 cstm-lbl">{{__('auth/escorts-register-advertising.about_me')}} <small class="small-txt-lable">({{__('auth/escorts-register-advertising.130_characters')}})</small></label>
                                                <div class="col-md-10 pl-md-0 pr-md-0 pl-0 pr-0">
                                                <div class="text-area-group">
                                                    <textarea  minlength="130" name="bio"  class="cstm-form-control cstm-txtarea" id="bio" placeholder="Type your text here…." cols="30" rows="10">{!! old('bio') !!}</textarea>
                                                    <span class="small-chare-count-txt"> <span id="chars"></span>  {{__('auth/escorts-register-advertising.characters_remaining')}}</span>
                                                
                                                    @error('bio')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group w-100 clone_language_data">
                                        @for ($i = 1; $i < 2; $i++)
                                            <div class="col-md-6 clone_count clone_language_this_{{$i}}">
                                                <div class="row">
                                                    <label for="" class="col-md-4 cstm-lbl">{{__('auth/escorts-register-advertising.language')}} {{$i}}   </label>
                                                    <div class="col-md-8 pl-md-0 pr-md-0 pl-0 pr-0">
                                                        <select class="cstm-select" name="languages[]">
                                                            @foreach ($alllanguages As $key => $value)
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor

                                    </div>
                                    <a href="#" class='add-link-btn add_language_section'>{{__('auth/escorts-register-advertising.add')}}</a>
                                </div>

                                <div class="mobility-form-row">
                                    <label>{{__('auth/escorts-register-advertising.your_mobility')}}</label>
                                    <div class="checkbox-field">
                                        <input type="checkbox" name="mobility[]" @if(old('mobility') && in_array('Incall', old('mobility'))) checked @endif  value="Incall" id="m1">
                                        <label for="m1">{{__('auth/escorts-register-advertising.incall')}}</label>
                                    </div>
                                    <div class="checkbox-field">
                                        <input type="checkbox" name="mobility[]" @if(old('mobility') && in_array('Outcall', old('mobility'))) checked @endif value="Outcall" id="m2">
                                        <label for="m2">{{__('auth/escorts-register-advertising.outcall')}}</label>
                                    </div>
                                    @error('mobility')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="hide-profile-row">
                                    <div class="checkbox-field">
                                        <input type="checkbox" value="1" name="hide_profile_from" id="m3">
                                        <label for="m3">{{__('auth/escorts-register-advertising.hide_my_profile_from')}}</label>
                                    </div>
                                    <div class="clone_this">
                                        <div class="select-field">
                                            <select name="hide_profile_country[]" class="hide_profile_country">
                                                @foreach ($countries As $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="select-field">
                                            <select name="hide_profile_city[]" class="hide_profile_city">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clone_data"></div>
                                </div>

                                <a href="#" class='add_hide_profile_section'>{{__('auth/escorts-register-advertising.add')}}</a>
                                <div class="select-speciality-wrapper">
                                    <h4>{{__('auth/escorts-register-advertising.select_specialities')}}</h4>
                                    <p class="d-md-none d-block small-text">{{__('auth/escorts-register-advertising.select_your_genuine_specialities')}}</p>
                                    @error('specialities')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="select-speciality-checkbox">
                                        @foreach ($specialities->chunk(10) As $specialities_chunk)
                                            @foreach ($specialities_chunk As $key => $value)
                                            <div class="checkbox-field">
                                                @if(old('specialities') && in_array($value->id, old('specialities')))
                                                <input type="checkbox" checked class="specialities" id="specialities-{{$value->id}}" value="{{$value->id}}" name="specialities[]" data-label="{{$value->name}}">
                                                @else
                                                <input type="checkbox" class="specialities" id="specialities-{{$value->id}}" value="{{$value->id}}" name="specialities[]" data-label="{{$value->name}}">
                                                @endif
                                                <label for="specialities-{{$value->id}}">{{$value->name}}</label>
                                            </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="advertisment-form-right">
                                <h3>Your Specialities (<span id="selected_specialities_count">0</span>)</h3>
                                <ul id='selected_specialities'>
                                    @foreach ($specialities As $key => $value)
                                    @if(old('specialities') && in_array($value->id, old('specialities')))
                                    <li>{{$value->name}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="privacy-wrapper">
                            <div class="mob-fix-bottom">
                                <button type="submit" class="btn">{{__('auth/escorts-register-advertising.continue')}}</button>
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
<script type='text/javascript' src="{{asset('js/jquery.inputmask.bundle.js')}}"></script>
<script type='text/javascript' src="{{asset('js/jquery.rateit.min.js')}}"></script>


<script type="text/javascript">
    $ = jQuery;

    jQuery("#state_id").change(function(){
        jQuery('#city_id > option').hide();
        jQuery('#city_id > option[data-stateid = '+this.value+']').show();
    });

    jQuery("#state_id").trigger('change');
    
    jQuery(document).ready(function(){
        jQuery("#height").inputmask({"mask": "9M99"});
    });

    $(document).ready(function(){
        $('select.hide_profile_country').trigger('change');
    
        $('.add_hide_profile_section').click(function(e){
            e.preventDefault();
            $('.clone_this').clone().removeClass('clone_this').appendTo('.clone_data');
        });

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
    
    $(document).on('change', 'select.hide_profile_country', function(){
        var $this;
        $this = $(this);
        var countryID = $this.val(); 
        
        if(countryID){
            $('#loading-bar-wrapper').show();
            $.ajax({
               type:"GET",
               url:"{{ route('home') }}/api/get-city-list?country_id="+countryID,
               success:function(res){               
                if(res){
                    $this.parent().next().find('select.hide_profile_city').empty();
                    $this.parent().next().find('select.hide_profile_city').append('<option value="">Select</option>');
                    $.each(res,function(key,value){
                        $this.parent().next().find('select.hide_profile_city').append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $this.parent().next().find('select.hide_profile_city').empty();
                }

                $('#loading-bar-wrapper').hide();
                
               }
            });
        }else{
            $this.parent().next().find('select.hide_profile_city').empty();
        }      
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
</script>
@endsection