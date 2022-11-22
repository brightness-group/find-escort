@extends('master')

@section('css')
<style type="text/css">
    .blog-detail.card .blog-title, .blog-detail.card .blog-desc{
        overflow: hidden;
        display: -webkit-box;
       -webkit-line-clamp: 2;
       -webkit-box-orient: vertical;
    }
</style>
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="home-banner-section blog-main-section" style="background-image: url({{ asset('images/home-banner.jpg') }});">
            <div class="container">
                <div class="blog-list-section">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 col-md-12 offset-md-0">
                            <div class="row cstm-row">
                                <h2 class="title text-center">Our Blog</h2>

                                @include('blog.cards')

                            </div>

                            @if(count($blogs))
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="javascript:void(0);" class="btn load-more-btn">Load More
                                            <span class="arrow-down"><img class="lazy" data-src="{{ asset('images/down-arrow-white.svg') }}" alt=""></span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var ENDPOINT = "{{ url('/') }}";
        var nextPage = 2;

        jQuery(document).ready(function(){
            $('.load-more-btn').on('click', function () {
                loadMoreBlogs(nextPage);
            });
        });

        function loadMoreBlogs(page) {
            $.ajax({
                url: ENDPOINT + "/blogs?page=" + page,
                datatype: "html",
                type: "get"
            })
            .done(function (response) {
                if (response.html == '') {
                    $('.load-more-btn').hide();
                    return;
                }
                else {
                    $(".cstm-row").append(response.html);
                    nextPage++;
                }
            });
        }
    </script>
@endsection
