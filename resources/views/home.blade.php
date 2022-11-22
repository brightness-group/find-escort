@extends('master')
@section('css')
<link rel='stylesheet' href="{{ asset('css/slick.css') }}" type='text/css' media='all' />
<style type="text/css">

.wishlist-ic.fill:before {
    content: "";
    background: url({{ asset('images/heart-fill.svg') }} ) no-repeat center center;
    background-size: contain;
    width: 21px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.scrollbar
{
    margin-left: 30px;
    height: 450px;
    overflow-y: scroll;
}
@media only screen and (max-width: 767px) {
    .scrollbar {
        height: 100%;
    }
}


#style-2::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #9A063D;
}

.home-banner-section{
    padding-top: 120px
}
@media only screen and (max-width: 767px) {
  .home-banner-section {
        padding-top: 26px;
    }
}

.accordion-filter-content .accordion-filter .menu-card {
    position: relative;
}

.accordion-filter-content .accordion-filter .menu-card .card-header .link-style {
    position: absolute !important;
    right: 36px;
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
        <div class="row">

            <div class="home-banner-section" style="background-image: url( {{ asset('images/home-banner.jpg') }});">
                <div class="container">
                    <div class="row m-0">
                        <div class="home-banner-slider">

                            @foreach($escort_sliders As $key => $single_escort)
                                <div class="home-banner-slider-item">
                                    <div class="
                                            home-banner-slider-item-inner
                                            @if(Cache::has('is_online' . $single_escort->id))
                                                status-green
                                            @endif
                                        ">
                                        <a href="{{route('home')}}/escort/{{$single_escort->username}}" class="img-link">
                                            <img class="lazy" data-src="{{ asset($single_escort->profileAvatar()) }}" alt="">
                                        </a>
                                        <div class="home-banner-slider-text">
                                            <a href="{{route('home')}}/escort/{{$single_escort->username}}" >
                                                <span class="product-name">{{ $single_escort->name }}</span>
                                            </a>
                                            <span class="product-location">{{ $single_escort->city ? $single_escort->city->name : "" }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="banner-text-section">
                            <h1 class="heading">{{__('home.heading')}}</h1>
                            <p>{{__('home.description')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="last-conection-section">
                <div class="container">
                    <div class="row m-0">
                        <h2>{{__('home.last_connection')}}</h2>
                        <div class="last-connection-slider">

                            @foreach($last_connections As $key => $single_escort)
                                <div class="last-connection-slider-item">
                                    <div class="last-connection-slider-item-inner">
                                        <div class="last-connection-slider-image">
                                        <a href="{{route('home')}}/escort/{{$single_escort->username}}" class="img-link">
                                                <img class="lazy" data-src="{{ asset($single_escort->profileAvatar()) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="last-connection-slider-text">
                                            <a href="{{route('home')}}/escort/{{$single_escort->username}}" >
                                                <h3 class="@if(Cache::has('is_online' . $single_escort->id)) online @endif">{{ $single_escort->name }}</h3>
                                            </a>
                                            <p>{!!  \Illuminate\Support\Str::limit( $single_escort->bio, 50, $end='...')  ?? 'This is dummy About me' !!}</p>
                                            <span class="time">{{ $single_escort->last_seen() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="find-your-girl-section" style="background-image: url({{ asset('images/find-your-girl-bg.jpg') }});">
                <div class="container">
                    <div class="row m-0">
                        <h2>{{__('home.find_your_girl')}}</h2>
                        <div class="find-girl-wrapper">
                            <div class="find-girl-sidebar">
                                <div class="find-girl-sidebar-inner">
{{--                                    <div class="find-girl-map">--}}
{{--                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8613149575076!2d6.146860015099146!3d46.19331839251713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7ad213a0c36d%3A0x71169adbc108c441!2sH%C3%B4pitaux%20Universitaires%20de%20Gen%C3%A8ve%20(HUG)!5e0!3m2!1sen!2suk!4v1613565674019!5m2!1sen!2suk" width="100%" height="" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--}}
{{--                                        <a class="view-map-btn" href="#viewMap" data-toggle="modal" title="VIEW MAP">{{__('home.view_map')}}</a>--}}
{{--                                    </div>--}}

                                    <div class="category-filter-block">
                                        <div class="category-filter-title">

                                            <span class="reset d-inline-block d-md-none"><a href="#" class="reset-btn">{{__('home.reset')}}</a></span>   <span class="tabname location">  {{__('home.location')}}</span>   <span class="done-text d-inline-block d-md-none"><a href="#" class="done-btn">{{__('home.done')}}</a></span>
                                        </div>
                                        <div class="category-filter-content scrollbar accordion-filter-content" id="style-2">
                                            <div id="accordion" class="accordion-filter">

                                                @foreach ($states As $key => $single_canton)
                                                    @php if(!in_array($single_canton->name, $canton)) {continue;}@endphp
                                                    <div class="menu-card">
                                                        <div class="card-header" id="heading_{{ $single_canton->id }}">
                                                            <h5 class="mb-0">
                                                                <div class="link-style collapsed" data-toggle="collapse" data-target="#collapse_{{ $single_canton->id }}" aria-expanded="false" aria-controls="collapseOne">
                                                                    <span style="visibility: hidden;">Anchor</span>
                                                                </div>
                                                                <div class="checkbox-field">
                                                                    <input type="checkbox" class="canton-filter" value="{{ $single_canton->id }}" id="canton_{{ $single_canton->id }}">
                                                                    <label for="canton_{{ $single_canton->id }}">{{ $single_canton->name }}</label>
                                                                </div>
                                                            </h5>
                                                        </div>

                                                        <div id="collapse_{{ $single_canton->id }}" class="collapse" aria-labelledby="heading_{{ $single_canton->id }}" data-parent="#accordion">
                                                            <div class="card-body">
                                                                @foreach ( $single_canton->cities As $key => $value)
                                                                    <div class="checkbox-field">
                                                                        <input type="checkbox" class="location-filter" value="{{ $value->id }}" id="remember{{ $value->id }}">
                                                                        <label for="remember{{ $value->id }}">{{ $value->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="category-filter-block">
                                        <div class="category-filter-title">
                                            <span class="reset d-inline-block d-md-none"><a href="#" class="reset-btn">{{__('home.reset')}}</a></span>   <span class="tabname gender">  {{__('home.gender')}}</span>   <span class="done-text d-inline-block d-md-none"><a href="#" class="done-btn">{{__('home.done')}}</a></span>
                                        </div>
                                        <div class="category-filter-content">
                                            <div class="checkbox-field">
                                                <input type="checkbox" value="girls" class="gender-filter" id="girls1">
                                                <label for="girls1">{{__('home.girls')}}</label>
                                            </div>

                                            <div class="checkbox-field">
                                                <input type="checkbox" value="trans" class="gender-filter" id="trans1">
                                                <label for="trans1">{{__('home.trans')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="find-girl-grid">
                                <div class="find-girl-grid-header">
                                    <ul class="tabs">
                                        <li class="tab-link current" data-tab="all"><span>{{__('home.all')}}</span></li>
                                        <li class="tab-link" data-tab="new"><span>{{__('home.new')}}</span></li>
                                        <li class="tab-link" data-tab="popular"><span>{{__('home.popular')}}</span></li>
                                        <li class="tab-link" data-tab="certified"><span>{{__('home.certified')}}</span></li>
                                    </ul>
                                    <div class="find-girl-grid-search">
                                        <input type="text" id="search-your-girl" placeholder="{{__('home.search')}}">
                                        <input type="submit">
                                    </div>
                                </div>
                                <div class="find-girl-grid-wrapper">
                                    <div id="find-your-girls" class="tab-content current">
                                        @include('home-find-your-girls')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-category-wrapper">
                <div class="home-category-block home-category-block-image" style="background-image: url( {{ asset('images/real-experiance-bg.jpg') }});">
                    <div class="home-category-block-text">
                        <h2>{{__('home.real_girlfriend_experience')}}</h2>
                        <p>{{__('home.online_search_work')}}</p>

                        @if (Auth::check())
                            @if( Auth()->user()->role == 'escort' || Auth()->user()->role == 'customer' )
                                <a href="
                                        @if( Auth()->user()->role  == 'customer')
                                            {{route('customers.profile.real.girlfriend.experience')}}
                                        @elseif( Auth()->user()->role  == 'escort')
                                            {{route('escorts.profile.real.girlfriend.experience')}}
                                        @endif
                                        "
                                    title="DISCOVER" class="discover-btn">{{__('home.discover')}}</a>
                            @endif
                        @else
                            <a href="#discoverModal" data-toggle="modal" title="DISCOVER" class="discover-btn">{{__('home.discover')}}</a>
                        @endif
                    </div>
                </div>
                <div class="home-category-block">
                    <div class="home-category-block-text">
                        <h2>{{__('home.another_escort_girl')}}</h2>
                        {!! __('home.another_escort_girl_content', ['ideabox' => route('idea.box')]) !!}

                        <div class="ft-social-block d-block d-md-none">

                            <ul>
                                <li class="insta-ic"><a href="@if($instagram_link){{ $instagram_link[0] }}@endif" title="{{__('footer.instagram')}}">{{__('footer.instagram')}}</a></li>
                                <li class="fb-ic"><a href="@if($facebook_link){{ $facebook_link[0] }}@endif" title="{{__('footer.facebook')}}">{{__('footer.facebook')}}</a></li>
                                <li class="twit-ic"><a href="@if($twitter_link){{ $twitter_link[0] }}@endif" title="{{__('footer.twitter')}}">{{__('footer.twitter')}}</a></li>
                            </ul>
                        </div>
                        <a href="{{ url(App\Models\Page::find(1)->slug) }}" title="{{__('home.read_more')}}" class="readmore-btn">{{__('home.read_more')}}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

   <!-- Discover Modal Content  -->
   <div class="modal fade discover-modal" id="discoverModal" tabindex="-1" role="dialog" aria-labelledby="discoverModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="heading">
                <h3 class="title">{{__('home.findher_or_she_will_find_you')}}</h3>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img class="lazy" data-src="{{ asset('images/icon-close-white.svg') }}" alt=""></span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="card card-white">
                            <div class="card-body">
                                <div class="title-text">Escorts</div>
                                <div class="content-text">
                                    {{__('home.escorts_desc')}}
                                </div>
                                <a href="{{route('girls.access')}}" class="btn">{{__('home.start')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                            <div class="card card-pink">
                            <div class="card-body">
                                <div class="title-text">Gentlemen</div>
                                <div class="content-text">
                                    {{__('home.gentlemen_desc')}}
                                </div>
                                <a href="{{route('register')}}" class="btn white-btn">{{__('home.start')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- View Map Modal Content --}}
<div class="modal fade  view-map-modal" id="viewMap" tabindex="-1" role="dialog" aria-labelledby="contactmemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">

        <div class="modal-content">
        <button type="button" class="close d-none d-md-block" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
        <div class="mobile-view-map-search d-flex d-md-none">
            <div class="search-one">
                <input type="text" placeholder="{{__('home.search')}}" class="search-input">
            </div>
            <div class="search-location">
                <input type="text" placeholder="{{__('home.location')}}" class="search-input">
            </div>
        </div>
        <div class="mobile-view-map d-block d-md-none">
                <a class="view-map-btn" href="#" data-dismiss="modal" title="{{__('home.view_map')}}"><img class="lazy" data-src="{{ asset('images/list-pink.svg') }}" alt="View Map"></a>
            </div>
            <div class="view-map-modal-section">
            <div class="view-map-modal-inner-wrp">
            <div id="location_map" style="width: 100%; height: 800px" class="bg-map"></div>
                <div class="card-wrp">
                    <div class="searchlocation-form">
                        <div class="my-location-search">
                            <input type="text" name="search_by_location" id="search_by_location_on_map" placeholder="Search by location">
                            <input type="submit">
                        </div>
                    </div>
                    <div class="card">
                        <div class="header-block">
                            <div class="left-b">
                                <p class="p-txt">{{__('home.girls_by_location')}}</p>
                            </div>
                            <div class="right-b">
                                <a href="#" class="filter-icon"></a>
                            </div>
                        </div>
                        <div class="card-inner-wrp">

                             <div id="girls_content_on_map" class="card-inner-list"></div>
                        </div>
                    </div>
                </div>
            </div>


            </div>


        </div>
    </div>
</div>
<!-- .row -->


<!-- Language Modal Mobile-->
<div class="modal fade select-langauage-modal" id="SelectLanguageModal" tabindex="-1" role="dialog" aria-labelledby="SelectLanguageModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{__('home.select_your_language')}}</h5>
      </div>
      <div class="modal-body">
            @php $locale = session()->get('locale'); @endphp

            <form action="#" class="select-language-form">
                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/en" @if($locale == "en") checked @endif name="language" id="languageEnglish">
                    <label for="languageEnglish">English</label>
                </div>

                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/fr" @if($locale == "fr") checked @endif name="language" id="languageFrench">
                    <label for="languageFrench">French</label>
                </div>

                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/de" @if($locale == "de") checked @endif name="language" id="languageDutch">
                    <label for="languageDutch">Dutch</label>
                </div>

                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/es" @if($locale == "es") checked @endif name="language" id="languageEspanol">
                    <label for="languageEspanol">Espanol</label>
                </div>

                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/it" @if($locale == "it") checked @endif name="language" id="languageItalian">
                    <label for="languageItalian">Italian</label>
                </div>

                <div class="checkbox-field">
                    <input type="radio" onclick="this.value && (window.location = this.value);" value="{{route('home')}}/lang/pt" @if($locale == "pt") checked @endif name="language" id="languagePortuguese">
                    <label for="languagePortuguese">Portuguese</label>
                </div>
            </form>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn " data-dismiss="modal">{{__('home.close')}}</button>
      </div>
    </div>
  </div>
</div>

<!-- Language Modal Mobile-->
@endsection


@section('js')
<script type='text/javascript' src="{{ asset('js/slick.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/popper.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/custom-slick.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=@if($instagram_link){{ $googe_map_key[0] }}@endif&callback=initMap&libraries=&v=weekly"
    async
    ></script>

<script type="text/javascript">
    $ = jQuery;

    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 0.5 second

    $(document).on('click', 'div.wishlist-ic', function(e){
        @if (Auth::check())
            $('#loading-bar-wrapper').show();
            $(this).toggleClass('fill');
            $.ajax({
               type:"POST",
               url:"{{ route('home') }}/api/likes",
               data: {
                        _token: "{{ csrf_token() }}",
                        id: $(this).attr('data-id'),
                        type : "like"
                    },
               success:function(res){
                    $('#loading-bar-wrapper').hide();
               }
            });
        @else
            alert('Please login to like profile');
        @endif
    });


    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        fetch_data('pagination', $(this));
    });

    $(document).on('click', 'ul.tabs li', function(event){
        event.preventDefault();
        fetch_data('tab', $(this));
    });

    $(document).on('keyup', '#search-your-girl', function(event){
        var $this;
        $this = $(this);
        event.preventDefault();
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function(){ fetch_data('search', $this) }, doneTypingInterval);
    });

    $(document).on('keydown', '#search-your-girl', function(event){
        clearTimeout(typingTimer);
    });


    $(".gender-filter, .canton-filter, .location-filter").on('click',  function (event) {
        //event.preventDefault();
        fetch_data('filter', $(this));
    });

    function fetch_data( type, $this)
    {
        var page, url, tab, search;
        $('#loading-bar-wrapper').show();
        var genders = $('.gender-filter:checked').map(function() { return this.value;}).get().join(', ');
        var location_ids = $('.location-filter:checked').map(function() { return this.value;}).get().join(', ');
        var canton_ids = $('.canton-filter:checked').map(function() { return this.value;}).get().join(', ');

        page    = 1;
        tab     = $('ul.tabs li.current').attr('data-tab');
        search  = $('#search-your-girl').val();

        if(type == 'pagination'){
            page = $this.attr('href').split('page=')[1];
        }else if(type == 'tab'){
            tab = $this.attr('data-tab');
        }

        url =  "{{ route('home') }}/home/ajax-find-your-girls?page="+page+"&tab="+tab+"&search="+search+"&genders="+genders+"&canton_ids="+canton_ids+"&location_ids="+location_ids;

        $.ajax({
            url:url,
            success:function(data)
            {
                $('#find-your-girls').html(data).addClass('current');
                $('.lazy').Lazy();
                $('html, body').animate({
                    scrollTop: $(".find-your-girl-section").offset().top - 50
                }, 500);

                initMap();
                $('#loading-bar-wrapper').hide();
            }
        });
    }

    function newLocation(map, newLat, newLng)
    {
        map.setCenter({
            lat : newLat,
            lng : newLng
        });
    }

    $('.mobile-location').focus(function(){
        $('html, body').animate({
            scrollTop: $(".find-your-girl-section").offset().top
        }, 2000);

        $(".category-filter-title .tabname.location").trigger('click');
    });

</script>
@endsection
