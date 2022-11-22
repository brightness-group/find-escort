<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-199955235-1">

        </script>

        <script>

          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-199955235-1');
        </script>
        @include('partials.meta')
        @include('partials.prologue')
    </head>
    <body class="@yield('bodyclass', 'home page-template page-template-template-home theme-preset-active')">
        <div id="page" class="site">
            @include('header')
            @yield('breadcrumb')
            <!-- #masthead -->
            @yield('content')
            @include('footer')
        </div>
        <!-- #page -->
        @include('partials.epilogue')
    </body>
</html>