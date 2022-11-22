@extends('master')
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="home-banner-section" style="background-image: url();">
                <div class="container">
                    <div class="row m-0">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection