@extends('master')
@section('css')
<style type="text/css">
    .girl-profile-wrapper .profile-right-section .activity-view-visit .girl-activity-visit .girl-activity-visit-inner{
    min-height: auto;
    }
    .error-404{
	    text-align: center;
	    color: #910539;
	    display: block;
	    font-size: 130px;
    }
</style>
@endsection
@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
            <div class="girl-profile-wrapper" style="background-image:url({{ asset('images/information-bg.jpg') }})">
                <div class="container">
                    <div class="row m-0 error-404">
                        404
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>

@endsection
