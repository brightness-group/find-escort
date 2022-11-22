@extends('master')
@php
$latlongdata = $availableLocations = array();
@endphp
@section('content')
<section class="user-customer-real-girl-frnd-exp-section" style="background-image: url({{ asset('images/home-banner.jpg')}});">
    <div class="real-girl-frnd-exp-inner-wrp">
        <div id="location_map" class="bg-map"></div>
        <div class="container">
            <div class="card-wrp">
                <div class="card">
                    <div class="card-innr-wrp" id="showexpriance">
                        <div class="heading">
                            <h5 id="rge-title">{{ __('customers/real-girlfriend-experience.real_girlfriend_experience') }}</h5>
                            <a href="#" class="more-icon d-none d-md-block"></a>
                        </div>
                        
                        <div class="heading-wth-bg">
                            <div class="checkbox-field">
                                <input type="checkbox" name="young" value="1" id="show_girls_in_my_location">
                                <label for="show_girls_in_my_location">{{ __('customers/real-girlfriend-experience.show_girls_in_my_locations') }} </label>
                            </div>
                        </div>
                        <div class="card-inner-list" id="rge-listing">
                            
                            @foreach ($experiences As $key => $single_user_data)
                                @foreach ($single_user_data->user_experiences as $key => $singleExperience)
                                    @php
                                        $latlongdata[] =  array(
                                        'position' => array(
                                        'lat' => (float) $singleExperience->location->lat,
                                        'lng' => (float) $singleExperience->location->long,
                                        ),
                                        'name' => $singleExperience->location->name,
                                        );
                                        $availableLocations[] = array(
                                        'id'    => $singleExperience->id,
                                        'lat'   => (float) $singleExperience->location->lat,
                                        'lng'   => (float) $singleExperience->location->long,
                                        'name'  => $singleExperience->location->name,
                                        'label' => $singleExperience->location->name,
                                        );
                                    @endphp
                                    <div class="usr-d-row">
                                        <div class="innr-wrp" data-toggle="collapse" href="#collapseContact{{$singleExperience->id}}" role="button">
                                            <div class="u-img">
                                                <img class="lazy" data-src="{{ asset($single_user_data->profileAvatar()) }}" alt="">
                                            </div>
                                            <div class="usr-lpcaton-d">
                                                <div class="bottom-d">
                                                    <h5 class="u-nm">{{ $single_user_data->name }}</h5>
                                                    <p class="currnt-loc-txt">{{ $singleExperience->message }} ... {{ __('customers/real-girlfriend-experience.join_me') }}</p>
                                                </div>
                                                <div class="top-d">
                                                    <div class="usr-h-nm">
                                                        {{ $singleExperience->location->name }}
                                                    </div>
                                                    <div class="time-status">
                                                        {{\Carbon\Carbon::createFromTimeString($singleExperience->from)->format('g:i A')}} -
                                                        {{\Carbon\Carbon::createFromTimeString($singleExperience->to)->format('g:i A')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapseContact{{$singleExperience->id}}">
                                            <div class="collaps-main-wrp">
                                                <div class="btn-wrps">
                                                    <a href="#contactmemodal{{$singleExperience->id}}"  data-toggle="modal" title="contact me" class="btn contact-btn" title="{{ __('customers/real-girlfriend-experience.contact_her') }}">{{ __('customers/real-girlfriend-experience.contact_her') }}</a>
                                                    <a class="btn view-profile-btn" href="{{route('home')}}/escort/{{$single_user_data->username}}" title="VIEW PROFILE"> {{ __('customers/real-girlfriend-experience.view_profile') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade  contactmemodal" id="contactmemodal{{$singleExperience->id}}" tabindex="-1" role="dialog" aria-labelledby="contactmemodalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img class="lazy" data-src="{{ asset('images/close-btn.svg') }}" alt=""></span>
                                                </button>
                                                <div class="modal-body">
                                                    <h4 class="title">{{ __('customers/real-girlfriend-experience.contact') }} {{ $single_user_data->name }}</h4>
                                                    <p class="p-txt">{{ __('customers/real-girlfriend-experience.send_sms_desc') }}</p>
                                                    <hr class="cstm-hr  d-none d-md-block">
                                                    <a href="callto:+{{$single_user_data->phone}}" class="contact-number  d-none d-md-block">+{{$single_user_data->phone}}</a>
                                                    <div class="cstm-btn-group">
                                                        <a href="sms:+{{$single_user_data->phone}}&body=Hi%2520there%252C%2520I%2527d%2520like%2520to%2520connect%2520with%2520you%2520for..." class="btn mail-btn">{{ __('customers/real-girlfriend-experience.send_sms') }}</a>
                                                        <a href="https://api.whatsapp.com/send?phone=+{{$single_user_data->phone}}" class="btn whatsapp-btn">{{ __('customers/real-girlfriend-experience.whatsapp') }}</a>
                                                    </div>
                                                    <a href="callto:+{{$single_user_data->phone}}" class="contact-number btn  d-block d-md-none">+{{$single_user_data->phone}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="searchlocation-form">
                    <form action="" class="search-f">
                        <div class="my-location-search">
                            <input type="text" placeholder="{{ __('customers/real-girlfriend-experience.search_by_location') }}" id="searchByLocation">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- .row -->
@endsection
@section('js')
<script
    src="https://maps.googleapis.com/maps/api/js?key=@if($instagram_link){{ $googe_map_key[0] }}@endif&callback=initMap&libraries=&v=weekly"
    async
    ></script>
<script type="text/javascript">
    $ = jQuery;

    // Initialize and add the map
    var map;
    function initMap() {

        const features = @json($latlongdata, JSON_PRETTY_PRINT);
        map = new google.maps.Map(document.getElementById("location_map"), {
            center: new google.maps.LatLng( 46.2044, 6.1432),
            zoom: 8,
        });

        var iconBase = '{{ asset('images/') }}/'
        
        // Create markers.
        for (let i = 0; i < features.length; i++) {
            const marker = new google.maps.Marker({
                position: features[i].position,
                icon: iconBase + 'profile-pin.svg',
                map: map,
            });

            //var latLng = marker.getPosition();
            //map.setCenter(latLng);
        }

        
    }

    function newLocation(newLat,newLng)
    {
        map.setCenter({
            lat : newLat,
            lng : newLng
        });
    }

    $(function () {
        var $html = "";
        var availableTags = @json($availableLocations, JSON_PRETTY_PRINT);;
        $("#searchByLocation").autocomplete({
            source: availableTags,
            select: function(event, ui) {
                console.log(ui.item.name + " " + ui.item.lat +" " + ui.item.lng );
                newLocation(ui.item.lat, ui.item.lng);
            },
            html: true,
            open: function(event, ui) {
               $(".ui-autocomplete").css("z-index", 999999);
            }
        });
    });

    jQuery("#show_girls_in_my_location").change(function() {

        var show_girls_in_my_location;

        jQuery('#loading-bar-wrapper').show();

        show_girls_in_my_location = false;

        if(this.checked){
            show_girls_in_my_location = true;
        }

        jQuery.ajax({
           type:"GET",
           url:"{{ route('home') }}/api/get-girls-in-my-location?show_girls_in_my_location="+show_girls_in_my_location,
           success:function(res){
            if(res){
                jQuery('#rge-listing').html(res);
            }else{
               jQuery('#rge-listing').html('');
            }
            jQuery('#loading-bar-wrapper').hide();
           }
        });
    });
</script>
@endsection
