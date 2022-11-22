@extends('master')

@section('content')
    <div id="content" class="site-content">
        <div class="home-banner-section blog-main-section" style="background-image: url({{ asset('images/home-banner.jpg') }});">
            <div class="back-page-nav nav-gray">
                <a href="{{ route('blogs.index') }}" class="prev-page-link"></a> {{ $blog->title }}
            </div>

            <div class="container">
                <div class="blog-list-section single-blog-detail">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 col-md-12 offset-md-0">
                            <div class="row cstm-row">
                                <ul class="keyword-list">
                                    @foreach($blog->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>

                                <h3 class="title text-center d-none d-lg-block d-md-block">{{ $blog->title }}</h3>

                                <div class="blog-detail">

                                    <div class="blog-desc">
                                        {!! $blog->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
