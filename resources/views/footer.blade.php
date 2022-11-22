<div id="footer-widget" class="row m-0 sm-none">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-7 ft-div ft-div-one">
                <div class="ft-logo-section">
                    <div class="ft-logo">
                        <img class="lazy" data-src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <div class="ft-logo-text">
                        <p>{{__('footer.description')}}</p>
                        <p>{{__('footer.mantra')}}</p>
                        <div class="ft-social-block">
                            <span>{{__('footer.findus_on')}}</span>
                            <ul>
                                <li class="insta-ic"><a href="@if($instagram_link){{ $instagram_link[0] }}@endif" title="{{__('footer.instagram')}}">{{__('footer.instagram')}}</a></li>
                                <li class="fb-ic"><a href="@if($facebook_link){{ $facebook_link[0] }}@endif" title="{{__('footer.facebook')}}">{{__('footer.facebook')}}</a></li>
                                <li class="twit-ic"><a href="@if($twitter_link){{ $twitter_link[0] }}@endif" title="{{__('footer.twitter')}}">{{__('footer.twitter')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-2 ft-div ft-div-two">
                <h3 class="widget-title">{{__('footer.categories')}}</h3>
                <ul>
                    <li class="{{ Request::is('girls') ? 'current-menu-item' : '' }}"><a href="{{route('girls')}}" title="{{__('footer.girls')}}">{{__('footer.girls')}}</a></li>
                    <li class="{{ Request::is('trans') ? 'current-menu-item' : '' }}"><a href="{{route('trans')}}" title="{{__('footer.trans')}}">{{__('footer.trans')}}</a></li>
                    <li class="{{ Request::routeIs('customers.profile.real.girlfriend.experience') ? 'current-menu-item' : '' }}"><a href="{{route('customers.profile.real.girlfriend.experience')}}" title="{{__('footer.real_girlfriend')}}">{{__('footer.real_girlfriend')}}</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3 ft-div ft-div-three">
                <h3 class="widget-title">{{__('footer.informations')}}</h3>
                <ul>
                    @foreach($cmsPages as $page)
                    <li><a href="{{ url($page->slug) }}" title="{{ $page->title }}">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
                <ul>
                    <li><a href="{{route('contact.us')}}" title="{{__('footer.contact_us')}}">{{__('footer.contact_us')}}</a></li>
                    <li><a href="{{ route('idea.box') }}" title="{{__('footer.idea_box')}}">{{__('footer.idea_box')}}</a></li>
                    <li><a href="{{ route('blogs.index') }}" title="{{__('footer.blogs')}}">{{__('footer.blogs')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<footer class="footer-bottom sm-none">
    <div class="container">
        <div class="site-info">
            <p>{{__('footer.copyright', [ 'year' => now()->year ])}}</p>
        </div>
        <!-- close .site-info -->
    </div>
</footer>

<div class="mobile-footer-bottom">
	     <ul>
	        <li class="mobile-home {{ (Route::currentRouteName() == 'home') ? 'active' : '' }}">
	            <a href="{{route('home') }}" title="{{__('footer.home')}}">{{__('footer.home')}}</a>
	        </li>

            <li class="mobile-category {{ (Route::currentRouteName() == 'girls') ? 'active' : '' }}">
	            <a href="{{route('girls')}}" title="{{__('footer.categories')}}">{{__('footer.categories')}}</a>
	        </li>

            @if (Auth::check())
                @if( Auth()->user()->role == 'escort' || Auth()->user()->role == 'customer' )
        	         <li class="
                                mobile-exp
                                @if( Auth()->user()->role  == 'customer')
                                    {{ (Route::currentRouteName() == 'customers.profile.real.girlfriend.experience') ? 'active' : '' }}
                                @elseif( Auth()->user()->role  == 'escort')
                                    {{ (Route::currentRouteName() == 'escorts.profile.real.girlfriend.experience') ? 'active' : '' }}
                                @endif
                        ">
        	            <a href="
                                    @if( Auth()->user()->role  == 'customer')
                                        {{route('customers.profile.real.girlfriend.experience')}}
                                    @elseif( Auth()->user()->role  == 'escort')
                                        {{route('escorts.profile.real.girlfriend.experience')}}
                                    @endif
                                    " title="{{__('footer.gf_experience')}}">{{__('footer.gf_experience')}}</a>
        	         </li>
                @endif
            @endif


	        <li class="mobile-fav {{ (Route::currentRouteName() == 'customers.profile') ? 'active' : '' }}">
	            <a href="{{route('customers.profile')}}" title="{{__('footer.favorites')}}">{{__('footer.favorites')}}</a>
	        </li>


            @if (Auth::check())
                @if( Auth()->user()->role == 'escort' )
                    <li class="mobile-notification">
        	            <a href="#" title="Notifications"  class="dropdown-toggle notification-submenu-toggle new-msg-active notification-button" data-toggle="dropdown">{{__('footer.notifications')}}</a>
                        <div class="dropdown-menu dropdown-menu-right notification-submenu notification-content">
                            <div class="back-page-nav nav-gray">
                            {{__('footer.notifications')}}
                            </div>
                            <ul>
                                <span class="notification-html" id="notification-html"></span>
                                <li class="seemore-li">
                                    <a href="#" class="seemore">{{__('footer.show_more')}}</a>
                                </li>
                            </ul>
                        </div>
        	        </li>
                @endif
            @endif


	        <li class="
                    mobile-profile
                    @if(Auth::check() )
                        @if( Auth()->user()->role  == 'customer')
                            {{ (Route::currentRouteName() == 'customers.profile.account.details') ? 'active' : '' }}
                        @elseif( Auth()->user()->role  == 'escort')
                            {{ (Route::currentRouteName() == 'escorts.profile') ? 'active' : '' }}
                        @endif
                    @endif
            ">
	            <a href="
                           @if(Auth::check() )
                               @if( Auth()->user()->role  == 'customer')
                                    {{route('customers.profile.account.details')}}
                                @elseif( Auth()->user()->role  == 'escort')
                                    {{route('escorts.profile')}}
                                @endif
                            @else
                                {{route('login')}}
                            @endif

                        " title="My Profile">{{__('footer.my_profile')}}</a>
	        </li>

	     </ul>
	</div>
<!-- #colophon -->
