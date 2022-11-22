@php
$latlongdata = $availableLocations = array();
$girls_on_map = "";
$favourite_user = array();
if(Auth::user()){
    $favourite_user = Auth::user()->likes()->where('type', 'like')->pluck('escort_id')->toArray();
}
@endphp
@if($find_your_girls->isNotEmpty())
    @foreach($find_your_girls As $key => $single_escort)
        <div class="find-girl-grid-block">
            <div class="find-girl-grid-block-inner">

                @if (in_array($single_escort->id, $pouplar_escort_ids))
                    <div data-id="{{$single_escort->id}}" class="fav-star @if(Auth::check() && $single_escort->isFavourite() > 0) fill @endif"><img class="lazy" data-src="@if(Auth::check() && $single_escort->isFavourite() > 0) {{ asset('images/star-pink.svg')}} @else {{ asset('images/star.svg')}} @endif" alt=""></div>
                @endif

                <div class="find-girl-grid-block-image">
                    <a href="{{route('home')}}/escort/{{$single_escort->username}}" class="img-link">
                        <img class="lazy" data-src="{{ asset($single_escort->profileAvatar()) }}" alt="">
                    </a>
                </div>
                <div class="find-girl-grid-block-text">
                    <div class="find-girl-grid-block-text-top">
                        <a href="{{route('home')}}/escort/{{$single_escort->username}}" >
                            <span class="find-girl-grid-product-name"> {{ $single_escort->name }} </span>
                        </a>
                        <span class="find-girl-grid-product-loc">{{ $single_escort->city ? $single_escort->city->name : "Geneva" }}</span>
                    </div>
                    <p>{!!  \Illuminate\Support\Str::limit( $single_escort->bio, 100, $end='...')  ?? 'This is dummy About me' !!}</p>
                </div>
                <div class="wishlist-ic
                        @if(in_array($single_escort->id, $favourite_user))
                            fill
                        @endif
                        " data-id="{{$single_escort->id}}"></div>
            </div>
        </div>
    @endforeach

    {{ $find_your_girls->links('vendor.pagination.bootstrap-4') }}
@else
    <div class="no-record">
        {{__('home-find-your-girls.no_record_found')}}
    </div>
@endif

@php
    foreach($find_your_girls_locations As $key => $single_escort){
        $latlongdata[] =  array(
            'position' => array(
                    'lat' => (float) ($single_escort->city ? $single_escort->city->lat : 0),
                    'lng' => (float) ($single_escort->city ? $single_escort->city->long : 0),
                ),
            'name' => $single_escort->city ? $single_escort->city->name : '',
        );

        $availableLocations[] = array(
            'id'    => $single_escort->id,
            'lat'   => (float) ($single_escort->city ? $single_escort->city->lat : 0),
            'lng'   => (float) ($single_escort->city ? $single_escort->city->long : 0),
            'name'  => ($single_escort->city ? $single_escort->city->name : ''),
            'label' => ($single_escort->city ? $single_escort->city->name : ''),
        );

        $city_name = $single_escort->city ? $single_escort->city->name : "";
        $user_name = $single_escort->name ? $single_escort->name : "";
        $girls_on_map .= '<div class="usr-d-row '.$city_name.'">';
            $girls_on_map .= '<div class="innr-wrp">';
                $girls_on_map .= '<div class="u-img">';
                $girls_on_map .= '<img class="lazy" data-src="'.asset($single_escort->profileAvatar()).'" alt="">';
                $girls_on_map .= '</div>';
                $girls_on_map .= '<div class="usr-lpcaton-d">';
                    $girls_on_map .= '<div class="top-d">';
                        $girls_on_map .= '<div class="usr-h-nm">';
                            $girls_on_map .= $user_name . ", " .$city_name;
                        $girls_on_map .= '</div>';
                        $girls_on_map .= '<div class="description">';
                            $girls_on_map .= \Illuminate\Support\Str::limit( preg_replace("/[\r\n]*/","", addslashes($single_escort->bio)), 100, $end='...');
                        $girls_on_map .= '</div>';
                        $girls_on_map .= '</div>';
                $girls_on_map .= '</div>';
            $girls_on_map .= '</div>';
        $girls_on_map .= '</div>';
    }
@endphp


<script type="text/javascript">
    // Initialize and add the map
    function initMap() {

        const features = @json($latlongdata, JSON_PRETTY_PRINT);

        const map = new google.maps.Map(document.getElementById("location_map"), {
            center: new google.maps.LatLng( 46.5353, 6.5897),
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
        }

        jQuery('#girls_content_on_map').html('{!! $girls_on_map !!}');

        jQuery(function () {
            var $html = "";
            var availableTags = @json($availableLocations, JSON_PRETTY_PRINT);;
            jQuery("#search_by_location_on_map").autocomplete({
                source: availableTags,
                select: function(event, ui) {
                    console.log(ui.item.name + " " + ui.item.lat +" " + ui.item.lng );

                    jQuery('.usr-d-row').hide();
                    jQuery('.usr-d-row.'+ui.item.name).show();

                    newLocation(map, ui.item.lat, ui.item.lng);
                },
                html: true,
                open: function(event, ui) {
                   jQuery(".ui-autocomplete").css("z-index", 999999);
                   jQuery('.usr-d-row').show();
                }
            });
        });
    }

</script>
