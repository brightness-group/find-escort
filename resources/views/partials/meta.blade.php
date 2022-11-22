<!-- COMMON TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Findher - Best Escort in Switzerland')</title>
<!-- Search Engine -->
<meta name="description" content="@yield('description', 'Findher - Best Escort in Switzerland')">
<meta name="image" content="@yield('image', asset('images/home.jpg'))">
<!-- Schema.org for Google -->
<meta itemprop="name" content="@yield('title', 'Findher - Best Escort in Switzerland')">
<meta itemprop="description" content="@yield('description', 'Findher - Best Escort in Switzerland')">
<meta itemprop="image" content="@yield('image', asset('images/home.jpg'))">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="@yield('title', 'Findher - Best Escort in Switzerland')">
<meta name="twitter:description" content="@yield('description', 'Findher - Best Escort in Switzerland')">
<meta name="twitter:site" content="@findher">
<meta name="twitter:creator" content="@findher">
<meta name="twitter:image:src" content="@yield('image', asset('images/home.jpg'))">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="@yield('title', 'Findher - Best Escort in Switzerland')">
<meta name="og:description" content="@yield('description', 'Findher - Best Escort in Switzerland')">
<meta name="og:image" content="@yield('image', asset('images/home.jpg'))">
<meta name="og:url" content="{{ url()->current() }}">
<meta name="og:site_name" content="Findher">
<meta name="og:locale" content="en_US">
@yield('meta')
<link rel="canonical" href="{{ url()->current() }}">

<div id="loading-bar-wrapper" class="loading-bar-wrapper">
    <div id="loading-bar-spinner" class="spinner">
        <div class="spinner-icon">            
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</div>