@extends('master')

@section('css')
<style type="text/css">
.tab-content.current {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    -moz-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    -o-flex-wrap: wrap;
    flex-wrap: wrap;
}

.find-girl-grid-block {
    width: 25%;
    padding: 0 19px;
    margin-bottom: 50px;
}

.find-girl-grid-block .find-girl-grid-block-inner {
    position: relative;
}

.wishlist-ic.fill:before {
    content: "";
    background: url({{ asset('images/heart-fill.svg') }}) no-repeat center center;
    background-size: contain;
}
</style>
@endsection


@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="girl-profile-wrapper" style="background-image:url({{ asset('images/information-bg.jpg') }})">
                <div class="container">
                    <div class="row m-0">
                        @include('customers.sidebar')
                        <div class="profile-right-section">

                            <form method="POST" action="{{ route('escorts.profile') }}">
                                @csrf
                                <div class="girl-profile-inner">
                                   <div class="tab-content current my-fevrioute">
                                    @if($favourite_users->isNotEmpty())
                                        @foreach($favourite_users As $key => $favourite_user)
                                            <div class="find-girl-grid-block">
                                                <div class="find-girl-grid-block-inner">
                                                    <div class="find-girl-grid-block-image">
                                                        <a href="{{route('home')}}/escort/{{$favourite_user->username}}" class="img-link">
                                                            <img class="lazy" data-src="{{ asset($favourite_user->profileAvatar()) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="find-girl-grid-block-text">
                                                        <div class="find-girl-grid-block-text-top">
                                                            <a href="{{route('home')}}/escort/{{$favourite_user->username}}" >
                                                                <span class="find-girl-grid-product-name label-active">{{$favourite_user->name}}</span>
                                                            </a>
                                                            <span class="find-girl-grid-product-loc">@if($favourite_user->city) {{$favourite_user->city->name}} @endif</span>
                                                        </div>

                                                        <p>{!!  \Illuminate\Support\Str::limit( $favourite_user->bio, 100, $end='...')  ?? 'This is dummy About me' !!}</p>
                                                    </div>
                                                    <div class="wishlist-ic fill" data-id="{{$favourite_user->id}}"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="no-record" style="text-align: center;width: 100%">{{ __('customers/profile.no_record_found') }} </div>
                                    @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    $ = jQuery;

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
                    $('#likes_count').html(res);
                    $('#loading-bar-wrapper').hide();
               }
            });
        @else
            alert('{{ __('customers/profile.login_to_like') }}');
        @endif
    });
</script>
@endsection
