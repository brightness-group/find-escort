@foreach($blogs as $blog)
    <div class="col-xl-4 col-lg-4 col-md-6 cstm-col">
        <div class="blog-inner-wrap">
            <div class="top-blog-img">
                <img class="lazy" data-src="{{ asset($blog->thumbnailPath(true)) }}" alt="">
                <a href="{{ route('blogs.show', $blog->slug) }}" class="btn read-more-btn">Read More</a>
            </div>

            <div class="blog-detail card">
                <h3 class="blog-title">{{ $blog->truncatedTitle() }}</h3>
                <div class="blog-desc" style="min-height: 40px">
                    {!! $blog->truncatedContent() !!}
                </div>
            </div>

            <a href="{{ route('blogs.show', $blog->slug) }}" class="moblink"></a>
        </div>
    </div>
@endforeach
