@extends('master')
@section('css')

@endsection
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="girl-profile-wrapper customer-profile-wrapper" style="background-image:url({{ asset('images/information-bg.jpg') }})">
                <div class="container">
                    <div class="row m-0">
                        @include('customers.sidebar')
                        <div class="back-page-nav nav-gray">
                            <a href="{{route('customers.profile.my.preferences')}}" class="prev-page-link"></a> {{ __('customers/preferences.my_preferences') }}
                        </div>
                        <div class="profile-right-section my-preferences-section">
                            <div class="cstm-row">
                                <div class="my-preferences-left-b">
                                    <div class="top-header-b">
                                        <div class="heading">
                                            <h2  class="d-none d-md-inline-block">{{ __('customers/preferences.escort_preferences') }}</h2>                                      
                                        </div>      
                                    </div>
                                    @if($user_preferences->count() > 0)
                                        <div class="user-preference-inner">
                                            <div class="preferences-card-list-row user-preference-list">
                                                @foreach($user_preferences as $key => $single_user_preference)
                                                    <div class="preferences-card-list">                                               
                                                        <div class="card-box">
                                                            <div class="card-box-form">
                                                                <div class="top-info-group">
                                                                    <div class="icon-wrap">
                                                                        <img class="lazy" data-src="{{ asset('images/user-icon.svg') }}" alt="">
                                                                    </div>                                                            
                                                                    <h5 class="title">{{$single_user_preference->name}}</h5>
                                                                </div>
                                                                <div class="check-list-box">
                                                                    <ul>
                                                                        @php
                                                                        $specialities_data = unserialize($single_user_preference->specialities);
                                                                        if($specialities_data){
                                                                            foreach($specialities_data as $specialities_data_key => $specialities_data_id){
                                                                                echo "<li>".App\Models\Speciality::find($specialities_data_id)->name."</li>";
                                                                            }
                                                                        }
                                                                        @endphp
                                                                    </ul>
                                                                </div>
                                                                <div class="button-wrap">
                                                                    <a href="{{ route('customers.profile.my.preferences').'/'.$single_user_preference->id.'/edit'}}" class="btn btn-white">{{ __('customers/preferences.edit_search') }}</a>
                                                                    <form method="POST" onsubmit="return confirm('{{ __('customers/preferences.alert_message') }}');" action="{{ route('customers.profile.my.preferences').'/'.$single_user_preference->id}}">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn-delete"><img class="lazy" data-src="{{ asset('images/delete-white.svg') }}" alt=""></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                @endforeach
                                           
                                                <div class="add-plus">
                                                    <button class="add-btn-icon" type="button"><img class="lazy" data-src="{{ asset('images/plus-white.svg') }}" alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>      
                                
                                <div class="preferences-right-b">
                                    <div class="top-b">
                                        <div class="left-info-wrap">
                                            <p>{{ __('customers/preferences.active_saved_search') }}</p>
                                            <small>{{ __('customers/preferences.save_your_preferences_in_search') }}</small>
                                        </div>
                                        <div class="right-switch-wrap">
                                            <div class="toggle-switch">
                                                <label class="switch">
                                                <input type="checkbox" value="1" name="save_preferences" @if ($user->save_preferences)) checked @endif id="save_preferences">
                                                <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cstm-row user-preference-form-add" @if($user_preferences->count() > 0) style="display:none" @endif>
                                <form method="POST" action="{{ route('customers.profile.my.preferences') }}" style="width: 100%; display: flex;">
                                    @csrf
                                    <div class="my-preferences-left-b">
                                        <div class="user-preference-inner">
                                            <div class="hide-show-wrap  ">
                                                <div class="user-preference-form">
                                                    <div class="row cstm-row-wrp">
                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.interested_in') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" name="girls" id="girls" value="1">
                                                                    <label for="girls">{{ __('customers/preferences.girls') }}</label>
                                                                </div>
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" name="trans" id="trans" value="1">
                                                                    <label for="trans">{{ __('customers/preferences.trans') }}</label>
                                                                </div>
                                                            </div>                                                    
                                                        </div>

                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.required_age') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @foreach($age_categories As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" name="age_categories[]" value="{{$value->id}}" id="required_age_{{$value->id}}">
                                                                        <label for="required_age_{{$value->id}}">{{$value->name}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-field col-md-4">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.only_certified') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                <div class="checkbox-field radiobox-field">
                                                                    <input type="radio" name="certified" value="1" id="certified_yes">
                                                                    <label for="certified_yes">{{ __('customers/preferences.yes') }}</label>
                                                                </div>

                                                                <div class="checkbox-field radiobox-field">
                                                                    <input type="radio" name="certified" value="0" id="certified_no">
                                                                    <label for="certified_no">{{ __('customers/preferences.no') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row cstm-row-wrp">
                                                        <div class="form-field col-md-3">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.language') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @foreach($alllanguages As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" name="language[]" value="{{$value->id}}" id="required_language_{{$value->id}}">
                                                                        <label for="required_language_{{$value->id}}">{{$value->name}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-field col-md-3">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.ethnicity') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @foreach($ethnicity As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" name="ethnicity[]" value="{{$value->id}}" id="required_ethnicity_{{$value->id}}">
                                                                        <label for="required_ethnicity_{{$value->id}}">{{ ucfirst($value->name) }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-field col-md-3">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.body') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @foreach($bodies As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" name="body[]" value="{{$value->id}}" id="required_body_{{$value->id}}">
                                                                        <label for="required_body_{{$value->id}}">{{$value->name}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-field col-md-3">
                                                            <div class="left-wrap">
                                                                <label>{{ __('customers/preferences.cup_size') }}</label>
                                                            </div>
                                                            <div class="right-wrap">
                                                                @foreach($cup_size As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" name="cup_size[]" value="{{$value->id}}" id="required_cup_size_{{$value->id}}">
                                                                        <label for="required_cup_size_{{$value->id}}">{{$value->name}}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="select-speciality-wrapper">
                                                        <div class="top-wrap">
                                                            <label>{{ __('customers/preferences.select_specialities') }}</label>
                                                            @error('specialities')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="select-speciality-checkbox">
                                                            @foreach ($specialities->chunk(16) As $specialities_chunk)
                                                                @foreach ($specialities_chunk As $key => $value)
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" 
                                                                    class="specialities" id="specialities-{{$value->id}}" value="{{$value->id}}" name="specialities[]" data-label="{{$value->name}}">
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
                                                        <input type="text" required placeholder="Title Profile" class="form-input" name="preference_title" id="">
                                                        <div class="error-b"></div>   
                                                    </div>
                                                </div>
                                                
                                                <div class="check-list-box">
                                                    <ul id="selected_specialities">
                                                    </ul>
                                                </div>

                                                <div class="button-wrap">
                                                    <button type="submit" class="btn btn-white">{{ __('customers/preferences.save_profile') }}</button>
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
$(document).on('change', '#save_preferences', function(){
    var $this;
    $this = $('input#save_preferences:checked');
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

$('.add-btn-icon').click(function(){
    $('.user-preference-list').hide();
    $('.user-preference-form-add').show();
});

</script>
@endsection