@extends('master')

@section('content')
    <div id="content" class="site-content">
        <div class="home-banner-section" style="background-image: url({{ asset('images/home-banner.jpg') }});">
            <div class="container">
                <div class="@if($cmsPage->slug == 'cgu') about-us-section terms-conditon-section @else {{ $cmsPage->slug }}-section @endif">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h1 class="title">{{ $cmsPage->title }}</h1>
                            {!! $cmsPage->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->
@endsection
