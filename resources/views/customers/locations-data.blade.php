@php
$latlongdata = array();
@endphp

<div class="location-search-result-inner">
    @foreach($userLocations As $city_name => $user_locations)
    <div class="location-search-result-list">
        <h5>{{$city_name}} ({{count($user_locations)}})</h5>
        @foreach($user_locations As $location_id => $location)
        @php
        $latlongdata[] =  array(
        'position' => array(
        'lat' => (float) $location['lat'],
        'lng' => (float) $location['long'],
        ),
        'name' => $location['name'],
        );
        @endphp
        <div class="location-search-result-box search-place-single-box">
            <div class="result-box-img">
                <img class="lazy" data-src="{{ asset('images/loc-image.png') }}" alt="">
            </div>
            <div class="result-box-detail">
                <h4>{{$location['name']}}, {{$city_name}}</h4>
                <p>Quai Turrettini 1, 1201 Genève, Switzerland</p>
                <div class="list-delete">
                    <form method="POST" onsubmit="return confirm('{{__('customers/locations-data.alert_message')}}');" action="{{ route('escorts.profile.locations') }}">
                        @csrf
                        <input type="hidden" name="user_location_id" value="{{$location_id}}">
                        <button class="delete-button"><img class="lazy" data-src="{{ asset('images/delete-ic.svg') }}" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>

<script type="text/javascript">
    // Initialize and add the map
      function initMap() {

        const features = @json($latlongdata, JSON_PRETTY_PRINT);
        console.log(features);

         const map = new google.maps.Map(document.getElementById("location_map"), {
            center: new google.maps.LatLng( 43.04321, 6.12952),
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
      }
</script>