@extends('master')
@section('content')
<div id="content" class="site-content">
<div class="home-banner-section" style="background-image: url({{ asset('/images/home-banner.jpg') }});">
    <div class="container">     
		<div class="contact-us-section">
			<div class="row ">                
				<div class="col-md-6 offset-md-3 offset-0">    
					<h3 class="title">Discover</h3>
						<p class="sub-txt">Findher or she will find you!</p>
						<div class="escorts">
							<h3>Escorts</h3>
							<a href="{{route('girls.access')}}">Start</a>
						</div>

						<div class="gentlemen">
							<h3>Gentlemen</h3>
							<a href="{{route('register')}}">Start</a>
						</div>

					</div>   
				</div>
			</div>
		</div>
    </div>
</div>
<!-- .row -->
@endsection
