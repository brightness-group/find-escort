<div class="profile-sidebar">
    <div class="profile-sidebar-inner">
        <ul>
            <li class="{{ (Route::currentRouteName() == 'customers.profile.locations') ? 'active' : '' }}"><a href="{{route('customers.profile.locations')}}" title="{{ __('customers/sidebar.my_locations') }}" class="my-location-icon">{{ __('customers/sidebar.my_locations') }}</a></li>
            <li class="{{ (Route::currentRouteName() == 'customers.profile') ? 'active' : '' }}"><a href="{{route('customers.profile')}}" title="{{ __('customers/sidebar.my_favourite') }}" class="my-profile-icon">{{ __('customers/sidebar.my_favourite') }}</a></li>
            <li class="{{ (Route::currentRouteName() == 'customers.profile.my.preferences') ? 'active' : '' }}"><a href="{{route('customers.profile.my.preferences')}}" title="{{ __('customers/sidebar.my_preferences') }}"  class="my-prefrance-icon">{{ __('customers/sidebar.my_preferences') }}</a></li>
            <li class="{{ (Route::currentRouteName() == 'customers.profile.account.details') ? 'active' : '' }}"><a href="{{route('customers.profile.account.details')}}" title="{{ __('customers/sidebar.account_details') }}" class="account-detail-icon">{{ __('customers/sidebar.account_details') }}</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"  class="logout-icon">{{ __('customers/sidebar.logout') }}</a>    
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div> 