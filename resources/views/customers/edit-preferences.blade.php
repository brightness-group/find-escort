@extends('master')
@section('css')

@endsection
@php
$selected_specialities = "";
@endphp
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="girl-profile-wrapper customer-profile-wrapper" style="background-image:url({{ asset('images/information-bg.jpg') }})">
                <div class="container">
                    <div class="row m-0">
                        @include('customers.sidebar')
                        <div class="back-page-nav nav-gray">
                            <a href="{{route('customers.profile.my.preferences')}}" class="prev-page-link"></a> {{__('customers/edit-preferences.my_preferences')}}
                        </div>
                        <div class="profile-right-section my-preferences-section">
                            
                            <div class="cstm-row user-preference-form-add">
                                <form method="POST" action="{{ route('customers.profile.my.preferences').'/'.$user_preferences->id}}" style="width: 100%; display: flex;">
                                    @method('PUT')
                                    @csrf
                                    <div class="my-preferences-left-b">
                                        <div class="user-preference-inner">
                                            <div class="hide-show-wrap  ">
                                                <div class="user-preference-form">
                                                    <div class="row cstm-row-wrp">
                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{__('customers/edit-preferences.interested_in')}}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" name="girls" value="1" @if($user_preferences->girls == 1) checked @endif id="girls">
                                                                    <label for="girls">{{__('customers/edit-preferences.girls')}}</label>
                                                                </div>
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" name="trans" value="1" @if($user_preferences->trans == 1) checked @endif id="trans">
                                                                    <label for="trans">{{__('customers/edit-preferences.trans')}}</label>
                                                                </div>
                                                            </div>                                                    
                                                        </div>

                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{__('customers/edit-preferences.required_age')}}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @php
                                                                        $user_preferences_age_categories = unserialize($user_preferences->ages) ?? array();
                                                                @endphp 
                                                                @foreach($age_categories As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input 
                                                                            type="checkbox" 
                                                                            name="age_categories[]" 
                                                                            value="{{$value->id}}" 
                                                                            @php if(in_array($value->id, $user_preferences_age_categories)){ echo 'checked';} @endphp
                                                                            id="required_age_{{$value->id}}">
                                                                        <label for="required_age_{{$value->id}}">{{$value->name}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{__('customers/edit-preferences.only_certified')}}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                <div class="checkbox-field radiobox-field">
                                                                    <input type="radio" name="certified" value="1" @if($user_preferences->certified == 1) checked @endif id="certified_yes">
                                                                    <label for="certified_yes">{{__('customers/edit-preferences.yes')}}</label>
                                                                </div>

                                                                <div class="checkbox-field radiobox-field">
                                                                    <input type="radio" name="certified" value="0" @if($user_preferences->certified == 0) checked @endif id="certified_no">
                                                                    <label for="certified_no">{{__('customers/edit-preferences.no')}}</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row cstm-row-wrp">
                                                            <div class="form-field col-md-3">
                                                                <div class="left-wrap">
                                                                    <label>{{__('customers/edit-preferences.language')}}</label>
                                                                </div>
                                                                <div class="right-wrap">
                                                                    @php
                                                                        $user_preferences_language = unserialize($user_preferences->language) ?? array();
                                                                    @endphp 
                                                                    @foreach($alllanguages As $key => $value)
                                                                        <div class="checkbox-field">
                                                                            <input 
                                                                                type="checkbox" 
                                                                                name="language[]" 
                                                                                value="{{$value->id}}"
                                                                                @php if(in_array($value->id, $user_preferences_language)){ echo 'checked';} @endphp
                                                                                id="required_language_{{$value->id}}"
                                                                            >
                                                                            <label for="required_language_{{$value->id}}">{{$value->name}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="form-field col-md-3">
                                                                <div class="left-wrap">
                                                                    <label>{{__('customers/edit-preferences.ethnicity')}}</label>
                                                                </div>
                                                                <div class="right-wrap">
                                                                    @php
                                                                        $user_preferences_ethnicity = unserialize($user_preferences->ethnicity) ?? array();
                                                                    @endphp 
                                                                    @foreach($ethnicity As $key => $value)
                                                                        <div class="checkbox-field">
                                                                            <input 
                                                                                type="checkbox" 
                                                                                name="ethnicity[]" 
                                                                                value="{{$value->id}}" 
                                                                                @php if(in_array($value->id, $user_preferences_ethnicity)){ echo 'checked';} @endphp
                                                                                id="required_ethnicity_{{$value->id}}"
                                                                            >
                                                                            <label for="required_ethnicity_{{$value->id}}">{{ ucfirst($value->name) }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="form-field col-md-3">
                                                                <div class="left-wrap">
                                                                    <label>{{__('customers/edit-preferences.body')}}</label>
                                                                </div>
                                                                <div class="right-wrap">
                                                                    @php
                                                                        $user_preferences_body = unserialize($user_preferences->body) ?? array();
                                                                    @endphp 
                                                                    @foreach($bodies As $key => $value)
                                                                        <div class="checkbox-field">
                                                                            <input 
                                                                                type="checkbox" 
                                                                                name="body[]" 
                                                                                value="{{$value->id}}" 
                                                                                @php if(in_array($value->id, $user_preferences_body)){ echo 'checked';} @endphp
                                                                                id="required_body_{{$value->id}}"
                                                                            >
                                                                            <label for="required_body_{{$value->id}}">{{$value->name}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="form-field col-md-3">
                                                                <div class="left-wrap">
                                                                    <label>{{__('customers/edit-preferences.cup_size')}}</label>
                                                                </div>
                                                                <div class="right-wrap">
                                                                    @php
                                                                        $user_preferences_cup_size = unserialize($user_preferences->cup_size) ?? array();
                                                                    @endphp 
                                                                    @foreach($cup_size As $key => $value)
                                                                        <div class="checkbox-field">
                                                                            <input 
                                                                                type="checkbox" 
                                                                                name="cup_size[]" 
                                                                                value="{{$value->id}}" 
                                                                                @php if(in_array($value->id, $user_preferences_cup_size)){ echo 'checked';} @endphp
                                                                                id="required_cup_size_{{$value->id}}"
                                                                            >
                                                                            <label for="required_cup_size_{{$value->id}}">{{$value->name}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="select-speciality-wrapper">
                                                        <div class="top-wrap">
                                                            <label>{{__('customers/edit-preferences.select_specialities')}}</label>
                                                            @error('specialities')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="select-speciality-checkbox">
                                                            
                                                            @php
                                                                $user_preferences_specialities = unserialize($user_preferences->specialities) ?? array();
                                                            @endphp

                                                            @foreach ($specialities->chunk(16) As $specialities_chunk)
                                                               @foreach ($specialities_chunk As $key => $value)
                                                                <div class="checkbox-field">
                                                                    @php
                                                                        if(in_array($value->id, $user_preferences_specialities)){ 
                                                                            $selected_specialities .= "<li>".$value->name."</li>";
                                                                        }
                                                                    @endphp
                                                                    <input
                                                                        type="checkbox" 
                                                                        class="specialities" 
                                                                        id="specialities-{{$value->id}}" 
                                                                        value="{{$value->id}}" 
                                                                        name="specialities[]" 
                                                                        data-label="{{$value->name}}"
                                                                        @php if(in_array($value->id, $user_preferences_specialities)){ echo 'checked';} @endphp
                                                                        >
                                                                        <label for="specialities-{{$value->id}}">{{$value->name}}</label>
                                                                </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                
                                    <div class="preferences-right-b">
                                        <div class="card-box user-preference-add">
                                            <div class="edit-card-box-form">
                                                <div class="top-input-group">
                                                    <div class="form-group">
                                                        <input type="text" required placeholder="Title Profile" class="form-input" name="preference_title" value="{{$user_preferences->name}}" id="">
                                                        <div class="error-b"></div>   
                                                    </div>
                                                </div>
                                                
                                                <div class="check-list-box">
                                                    <ul id="selected_specialities">
                                                        @php
                                                            echo $selected_specialities;
                                                        @endphp
                                                    </ul>
                                                </div>

                                                <div class="button-wrap">
                                                    <button type="submit" class="btn btn-white">{{__('customers/edit-preferences.update_profile')}}</button>
                                                </div>

                                            </div>
                                        </div>   
                                    </div>
                                </form>    
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$ = jQuery;    
$(document).on('change', '#real_girlfriend_experience', function(){
    var $this;
    $this = $('input#real_girlfriend_experience:checked');
    var active_saved_search = $this.val();
    if(typeof active_saved_search == "undefined"){
        active_saved_search = 0;
    }
   
    $('#loading-bar-wrapper').show();
    $.ajax({
       type:"POST",
       url:"{{ route('home') }}/api/active-saved-search",
       data: {
                _token: "{{ csrf_token() }}",
                active_saved_search: active_saved_search,
            },
       success:function(res){
            $('#loading-bar-wrapper').hide();
       }
    });
});

/*Show selected specialities in sidebar of adversting form*/
$(".specialities").change(function() {
    var specialities_array = new Array();
    var specialities_serialize_array = new Array();

    $(".specialities").each(function() {
        if ($(this).is(':checked')) {
            specialities_array.push("<li>" + $(this).attr('data-label') + "</li>");
            specialities_serialize_array.push({
                id: $(this).val(),
                label:  $(this).attr('data-label')
            })
        }
    });

    console.log(specialities_serialize_array);
    $('#preference_specialities_payload').val(JSON.stringify(specialities_serialize_array));

    console.log(JSON.stringify(specialities_serialize_array));
    $('#selected_specialities').html(specialities_array.join(''));
});
</script>
@endsection