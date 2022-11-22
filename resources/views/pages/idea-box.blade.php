@extends('master')
@section('content')
<div id="content" class="site-content">
	<div class="home-banner-section" style="background-image: url({{ asset('/images/home-banner.jpg') }});">
    	<div class="container"> 
			<div class="idea-box-section">      
				<div class="row m-0">					 
					<div class="col-lg-8 offset-lg-2 offset-0 pl-lg-3 pl-0 pr-lg-3 pr-0">
						<h1 class="title">{{ __('pages/idea-box.title') }}</h1>

						@if (session('success'))
	                        <div class="alert alert-success">
	                            {{ session('success') }}
	                        </div>
	                    @endif
	                    
						<p class="sub-txt">{{ __('pages/idea-box.description') }}</p>
						
						<form method="POST" class="idea-box-form" action="{{ route('idea.box') }}">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="name" class="cstm-label">{{ __('pages/idea-box.name') }}</label>							
										<input class="form-control" type="text" name="name" required placeholder="">
										@error('name')
											<span class="text-danger error-msg-block">{{ $message }}</span>
										@enderror
									</div>
							
									<div class="form-group">
										<label for="headline" class="cstm-label">{{ __('pages/idea-box.idea_title') }}</label>
										<input class="form-control" type="text" name="title" required placeholder="">
										@error('title')
											<span class="text-danger error-msg-block">{{ $message }}</span>
										@enderror
									</div>		
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="content" class="cstm-label">{{ __('pages/idea-box.idea_content') }}</label>
										<textarea class="form-control" id="content"  required name="content"></textarea>
										@error('content')
											<span class="text-danger error-msg-block">{{ $message }}</span>
										@enderror
									</div>			
								</div>
							</div>								
							<div class="row row-bottom">

								<div class="col-lg-6">
									<div class="confirm-btn-wrp">
										<button class="btn submit-contact" type="submit">{{ __('pages/idea-box.submit') }}</button>
									</div>										
								</div>
								<div class="col-lg-6">
									<div class="recaptcha-block">
										{!!  GoogleReCaptchaV3::renderField('contact_us_id','contact_us') !!}
										@error('g-recaptcha-response')
											<span class="text-danger error-msg-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>	
						</form>
					</div>					
				</div>
				<div class='idea-boxes-wrap'>	
					<div class="row">
						@foreach($ideas As $key => $data)
						<div class="col-lg-3 col-md-6">
							<div class="single-idea">
								<div class="title">{{$data->title}}</div>
								<div class="content">{{$data->content}}</div>
								<div class="date">{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans(['options' => \Carbon\Carbon::JUST_NOW | \Carbon\Carbon::ONE_DAY_WORDS | \Carbon\Carbon::TWO_DAY_WORDS]) }}</div>
							</div>		
						</div>
						@endforeach					
					</div>						
					{{ $ideas->links('vendor.pagination.bootstrap-4') }}
				</div>   

			
			</div>          
        </div>
    </div>
</div>
<!-- .row -->
@endsection

@section('js')
{!!  GoogleReCaptchaV3::init() !!}
@endsection