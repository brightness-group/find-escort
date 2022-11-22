<header id="masthead" class="site-header navbar-static-top navbar-dark bg-primary" role="banner">
    <div class="container">
        <nav class="navbar navbar-expand-xl p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @php $locale = session()->get('locale'); @endphp
            <div class="header-language">
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="{{route('home')}}/lang/en" @if($locale == "en") selected @endif>EN</option>
                    <option value="{{route('home')}}/lang/fr" @if($locale == "fr") selected @endif>FR</option>
                    <option value="{{route('home')}}/lang/de" @if($locale == "de") selected @endif>DE</option>
                    <option value="{{route('home')}}/lang/es" @if($locale == "es") selected @endif>ES</option>
                    <option value="{{route('home')}}/lang/it" @if($locale == "it") selected @endif>IT</option>
                    <option value="{{route('home')}}/lang/pt" @if($locale == "pt") selected @endif>PT</option>
                </select>
            </div>
            
            <div class="header-search">
                <input type="text" id="main-search-girl" placeholder="Search">
                <div id="mainSearchGirlsList" style="position: absolute; width: 100%; padding: 0 22px 0 0px;">
                </div>
                <input type="submit">
            </div>

            <div class="navbar-brand">
                <a href="{{route('home')}}">
                    <img class="lazy" data-src="{{ asset('images/mobile-logo.png') }}" alt="Findher">
                </a>
            </div>

            <div id="main-nav" class="collapse navbar-collapse justify-content-center">
                <ul id="menu-menu-1" class="navbar-nav">
                    <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}"><a title="{{__('header.home')}}" href="{{route('home') }}" class="nav-link" aria-current="page">{{__('header.home')}}</a></li>
                    <li class="{{ Request::is('girls') ? 'current-menu-item' : '' }}"><a title="{{__('header.girls')}}" href="{{route('girls')}}" class="nav-link">{{__('header.girls')}}</a></li>
                    <li class="site-center-logo">
                        <a href="{{route('home')}}" class="nav-link" aria-current="page"><img class="lazy" data-src="{{ asset('images/logo.png') }}" /></a>
                    </li>
                    <li class="{{ Request::is('trans') ? 'current-menu-item' : '' }}"><a title="{{__('header.trans')}}" href="{{route('trans')}}" class="nav-link">{{__('header.trans')}}</a></li>
                    <li class="{{ Request::is('faq') ? 'current-menu-item' : '' }}"><a title="{{__('header.faq')}}" href="{{ url(App\Models\Page::find(2)->slug) }}" class="nav-link">{{__('header.faq')}}</a></li>
                </ul>
            </div>
            
            <div id="mobile-nav" class="collapse navbar-collapse justify-content-start align-items-start">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <ul id="mobile-menu-header" class="navbar-nav mobile-menu-header">
                    <li class="member"><a title="{{__('header.members_access')}}" href="{{route('register')}}" class="nav-link">{{__('header.members_access')}}</a></li>
                    <li class="girl"><a title="{{__('header.girls_access')}}" href="{{route('girls.access')}}" class="nav-link">{{__('header.girls_access')}}</a></li>
                </ul>

                <ul id="mobile-menu" class="navbar-nav mobile-menu-body">
                    <li class="about-us"><a href="{{route('home')}}" class="nav-link">{{__('header.home')}}</a></li>
                    <li class="girls"><a title="{{__('header.girls')}}" href="{{route('girls')}}" class="nav-link">{{__('header.girls')}}</a></li>
                    <li class="trans"><a title="{{__('header.trans')}}" href="{{route('trans')}}" class="nav-link">{{__('header.trans')}}</a></li>
                    <li class="girlfriend"><a title="{{__('header.girlfriend_experience')}}" href="{{route('customers.profile.real.girlfriend.experience')}}" class="nav-link">{{__('header.girlfriend_experience')}}</a></li>
                    <li class="language"><a title="{{__('header.select_your_language')}}" data-toggle="modal" href="#SelectLanguageModal" class="nav-link">{{__('header.select_your_language')}}</a></li>

                    @foreach($cmsPages as $page)
                        <li class="{{ $page->slug }}">
                            <a title="{{ $page->title }}" href="{{ url($page->slug) }}" class="nav-link">{{ $page->title }}</a>
                        </li>
                    @endforeach

                    <li class="cgu">
                        <a href="{{ route('blogs.index') }}" class="nav-link" title="{{__('footer.blogs')}}">{{__('footer.blogs')}}</a>
                    </li>

                    <li class="contact">
                        <a title="{{__('header.contact_us')}}" href="{{route('contact.us')}}" class="nav-link">{{__('header.contact_us')}}</a>
                    </li>
                    <li class="idea">
                        <a title="{{__('header.idea_box')}}" href="{{route('idea.box') }}" class="nav-link">{{__('header.idea_box')}}</a>
                    </li>
                    <li class="desktop">
                        <a title="{{__('header.desktop_site')}}" href="#" class="nav-link">{{__('header.desktop_site')}}</a>
                    </li>
                </ul>

                <ul id="mobile-menu-footer" class="navbar-nav mobile-menu-footer">
                    <li class="site-info"><p>{{__('header.copyright', [ 'year' => now()->year ])}}</p></li>
                </ul>
            </div>
            <div class="header-right">
                @if (Auth::check())
                @if( Auth()->user()->role == 'escort' || Auth()->user()->role == 'customer' )

                <div class="header-location">
                    <a href="
                            @if( Auth()->user()->role  == 'customer')
                                {{route('customers.profile.real.girlfriend.experience')}}
                            @elseif( Auth()->user()->role  == 'escort')
                                {{route('escorts.profile.real.girlfriend.experience')}}
                            @endif
                            " title=""></a>
                </div>

                @if( Auth()->user()->role == 'escort' )

                    <div class="header-notification">
                        <a href="#" title="" class="dropdown-toggle notification-submenu-toggle @if($unread_events > 0) new-msg-active @endif notification-button" id="notification-button" data-toggle="dropdown"></a>
                        <div class="dropdown-menu dropdown-menu-right notification-submenu notification-content" id="notification-content">
                            <ul>
                                <span class="notification-html" id="notification-html"></span>
                                <li class="seemore-li">
                                    <a href="#" class="seemore">{{__('header.show_more')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="header-girl-profile">
                    <div class="user-img dropdown-toggle user-submenu-toggle" data-toggle="dropdown">
                        <img class="lazy" data-src="{{ asset(Auth()->user()->profileAvatar()) }}" alt="">
                    </div>
                    <div class="dropdown-menu dropdown-menu-right user-submenu">
                        <ul>
                            @if( Auth()->user()->role == 'escort' )
                                <li class=""><a href="{{route('escorts.profile.locations')}}" title="{{__('header.my_locations')}}" class="my-location-icon">{{__('header.my_locations')}}</a></li>
                                <li class=""><a href="{{route('escorts.profile')}}" title="{{__('header.my_profile')}}" class="my-profile-icon">{{__('header.my_profile')}}</a></li>
                                <li class=""><a href="{{route('escorts.profile.activity')}}" title="{{__('header.my_activity')}}" class="my-activity-icon">{{__('header.my_activity')}}</a></li>
                                <li class=""><a href="{{route('escorts.profile.account.details')}}" title="{{__('header.account_details')}}" class="account-detail-icon">{{__('header.account_details')}}</a></li>
                                <li class=""><a href="{{route('escorts.profile.boost.my.ad')}}" title="{{__('header.boost_my_ad')}}" class="boost-my-add-icon">{{__('header.boost_my_ad')}}</a></li>
                                <li class=""><a href="{{route('escorts.profile.refer.a.friend')}}" title="{{__('header.refer_a_friend')}}" class="refer-a-friend-icon">{{__('header.refer_a_friend')}}</a></li>
                            @endif


                            @if( Auth()->user()->role == 'customer' )
                                <li class="{{ (Route::currentRouteName() == 'customers.profile.locations') ? 'active' : '' }}"><a href="{{route('customers.profile.locations')}}" title="{{ __('customers/sidebar.my_locations') }}" class="my-location-icon">{{ __('customers/sidebar.my_locations') }}</a></li>
                                <li class="{{ (Route::currentRouteName() == 'customers.profile') ? 'active' : '' }}"><a href="{{route('customers.profile')}}" title="{{ __('customers/sidebar.my_favourite') }}" class="my-profile-icon">{{ __('customers/sidebar.my_favourite') }}</a></li>
                                <li class="{{ (Route::currentRouteName() == 'customers.profile.my.preferences') ? 'active' : '' }}"><a href="{{route('customers.profile.my.preferences')}}" title="{{ __('customers/sidebar.my_preferences') }}"  class="my-prefrance-icon">{{ __('customers/sidebar.my_preferences') }}</a></li>
                                <li class="{{ (Route::currentRouteName() == 'customers.profile.account.details') ? 'active' : '' }}"><a href="{{route('customers.profile.account.details')}}" title="{{ __('customers/sidebar.account_details') }}" class="account-detail-icon">{{ __('customers/sidebar.account_details') }}</a></li>
                            @endif

                                
                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="logout-icon">{{__('header.logout')}}</a> </li>    

                        </ul>
                    </div>
                    <a href="
                            @if( Auth()->user()->role  == 'customer')
                                {{route('customers.profile')}}
                            @elseif( Auth()->user()->role  == 'escort')
                                {{route('escorts.profile')}}
                            @else
                                /
                            @endif
                            ">
                        <span>{{Auth()->user()->name ? Auth()->user()->name : Auth()->user()->username }}</span>
                    </a>
                </div>
                @endif
                @else
                    <div class="member-access-button">
                        @if (Route::has('register'))
                        <a class="btn" href="{{route('register') }}" title="{{__('header.members_access')}}">{{__('header.members_access')}}</a>
                        @endif
                    </div>
                    <div class="girl-access-button">
                        @if (Route::has('escorts.register.information'))
                        <a class="btn" href="{{route('girls.access') }}" title="{{__('header.girls_access')}}">{{__('header.girls_access')}}</a>
                        @endif
                    </div>
                @endif
            </div>
        </nav>
    </div>
</header>
