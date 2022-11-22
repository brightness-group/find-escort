@extends('master')
@section('css')
<style type="text/css">
    .delete-button{background: none; border: none;}
</style>
@endsection

@php
$latlongdata = array();
@endphp

@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="girl-profile-wrapper" style="background-image:url({{asset('images/information-bg.jpg')}})">
                <div class="container">
                    <div class="row m-0">
                        @include('customers.sidebar')
                        <div class="back-page-nav nav-gray">
                            <a href="{{route('customers.profile.locations')}}" class="prev-page-link"></a> {{ __('customers/locations.my_location') }}
                        </div>
                        <div class="profile-right-section location-right-section">
                            <div class="top-header-b">
                                <div class="d-left-wrp">
                                    <form method="POST" action="{{ route('real.girlfriend.experience') }}">
                                        @csrf
                                        <h2>{{ __('customers/locations.real_girlfriend_experience') }}</h2>
                                        <div class="toggle-switch">
                                            <label class="switch">
                                            <input type="checkbox" value="1" name="real_girlfriend_experience" @if ($user->real_girlfriend_experience)) checked @endif id="real_girlfriend_experience">
                                            <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                @if($user->real_girlfriend_experience == 1)
                                    <div class="d-right-wrp">
                                        <a href="#suggestNewPlacemodal" class="btn white-btn" data-toggle="modal" >{{ __('customers/locations.suggest_places') }}</a>
                                    </div>
                                @endif
                            </div>

                            <div class="profile-right-location">
                                <div class="my-location-part" id="myLocationPart">
                                    <div class="my-location-box">
                                        <div class="my-location-box-top">
                                            <h4>My Locations</h4>
                                            <select name="city_filter">
                                                <option value="">{{ __('customers/locations.sort_by_city') }}</option>
                                                <option value="asc">{{ __('customers/locations.asc') }}</option>
                                                <option value="desc">{{ __('customers/locations.desc') }}</option>
                                            </select>
                                        </div>
                                        <div class="my-location-search">
                                            <input type="text" placeholder="Search your locations" id="filterInput">
                                            <input type="submit">
                                        </div>
                                    </div>
                                    <div class="location-search-result" id="user-location-data">
                                        @include('customers.locations-data')
                                    </div>
                                </div>
                                <div class="location-map-view">
                                 <div id="location_map" class="location_map"></div>
                                </div>
                                <div class="my-location-part my-new-place" id="myNewPlace" style="display:none;">
                                    <div class="my-location-box">
                                        <div class="my-location-box-top">
                                            <h4>{{ __('customers/locations.add_new_place') }}</h4>
                                        </div>
                                        <div class="my-location-search">
                                            <input type="text" placeholder="Search your locations" id="search_to_add">
                                            <input type="submit">
                                        </div>
                                    </div>
                                    <div class="location-search-result">
                                        <div class="location-search-result-inner">
                                            <div class="location-search-result-list">
                                                @foreach($locations As $key => $location)

                                                <div class="location-search-result-box add-new-place-single-box">
                                                    <div class="result-box-img">
                                                        <img class="lazy" data-src="{{ asset('images/loc-image.png') }}" alt="">
                                                    </div>
                                                    <div class="result-box-detail">
                                                        <h4>{{$location->name}}@if($location->city) , {{$location->city->name}} @endif</h4>
                                                        <p>Weinmarkt, 6004 Luzern, Switzerland</p>
                                                        <div class="list-add">
                                                            <form >
                                                                <a href="javascript:void(0);" class="add-button" data-id="{{$location->id}}">
                                                                <span class="circle-icon" ><img class="lazy" data-src="{{ asset('images/add-circle.svg') }}" alt=""></span>
                                                                <span class="checked-icon"  style="display:none"><img class="lazy" data-src="{{ asset('images/circle-checked.svg') }}" alt=""></span>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mob-fix-bottom">
                                    <a href="{{route('customers.profile.locations')}}" class="btn cancel-btn">{{ __('customers/locations.cancel') }}</a>
</div>
                                </div>
                                <div class="add-new-place">
                                    <a class="btn addnw-place" href="#" title="ADD NEW PLACE">{{ __('customers/locations.add_new_place') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>

<div class="modal fade  suggest-new-place-modal" id="suggestNewPlacemodal" tabindex="-1" role="dialog" aria-labelledby="suggestNewPlacemodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-body">
            <h4 class="title">{{ __('customers/locations.suugest_new_places') }}</h4>
            <form method="POST" action="{{url('api/location-suggestion')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-3">{{ __('customers/locations.name') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Place name" required name="name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Address" class="col-md-3">{{ __('customers/locations.address') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"  name="address" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="City" class="col-md-3">{{ __('customers/locations.city') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"  name="city" required value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ZIP Code" class="col-md-3">{{ __('customers/locations.zip_code') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"  name="zipcode" value="">
                        </div>
                    </div>

                <div class="confirm-btn-row">
                    <button class="btn confirm-btn submit-new-location" type="submit">{{ __('customers/locations.submit') }}</button>
                </div>
            </form>
        </div>

    </div>
  </div>
</div>


@endsection
@section('js')
<script
    src="https://maps.googleapis.com/maps/api/js?key=@if($instagram_link){{ $googe_map_key[0] }}@endif&callback=initMap&libraries=&v=weekly"
    async
    ></script>
<script type="text/javascript">
    
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 0.5 second

    function fetch_data()
    {
        var orderby, search;
        orderby = jQuery("select[name=city_filter]").find(":selected").val();
        search = jQuery('#filterInput').val().toLowerCase();

        jQuery('#loading-bar-wrapper').show();
        url = "{{ route('customers.profile.ajax.locations') }}?search="+search+"&orderby="+orderby;

        jQuery.ajax({
            url:url,
            success:function(data)
            {
                jQuery('#user-location-data').html(data);
                initMap();
                jQuery('#loading-bar-wrapper').hide();
            }
        });
    }

    jQuery(document).ready(function(){
        
        jQuery(document).on('keyup', '#filterInput', function(event){
            var $this;
            $this = jQuery(this);
            event.preventDefault();
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function(){ fetch_data() }, doneTypingInterval);
        });

        jQuery(document).on('keydown', '#filterInput', function(event){
            clearTimeout(typingTimer);
        });

        jQuery("select[name=city_filter]").change(function(e){
            fetch_data();
        });

        jQuery("#search_to_add").on("keyup", function() {
            var value = jQuery(this).val().toLowerCase();
            jQuery(".add-new-place-single-box").filter(function() {
            jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        jQuery('.addnw-place').click(function() {
            @if($user->real_girlfriend_experience == 0)
                alert('{{ __('customers/locations.alert_rge_experience') }}');
                return false;
            @endif

            jQuery('#myLocationPart').hide();
            jQuery('#myNewPlace').show();
            jQuery('.add-new-place').hide();
            jQuery('.cancel-btn').show();
        });

        jQuery("#myNewPlace .list-add .add-button").click(function() {

            @if($user->real_girlfriend_experience == 0)
                alert('{{ __('customers/locations.alert_rge_experience') }}');
                return false;
            @endif
            jQuery('#loading-bar-wrapper').show();
            jQuery(this).toggleClass("active");
            jQuery.ajax({
               type:"POST",
               url:"{{ route('home') }}/api/add-user-location",
               data: {
                        _token: "{{ csrf_token() }}",
                        location_id: jQuery(this).attr('data-id'),
                    },
                success:function(res){
                    jQuery('#loading-bar-wrapper').hide();
                }
            });
        });

        jQuery("#real_girlfriend_experience").change(function() {
            this.form.submit();
        });
    });
</script>
@endsection
