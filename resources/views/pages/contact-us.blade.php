@extends('master')
@section('content')

	@if(session()->has('success'))
    	<!-- Complete Modal -->
        <div class="modal fade complete-modal" id="CompleteModal" tabindex="-1" role="dialog" aria-labelledby="CompleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                        <div class="success-icon"></div>    
                </div>
                <div class="modal-body">
                        <div class="popup-text-msg">
                        <p>{{ __('pages/contact-us.success_message_line_1') }}</p>
                        <p>{{ __('pages/contact-us.success_message_line_1') }}</p>
                        </div>           
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn" data-dismiss="modal">{{ __('pages/contact-us.ok') }}</button>
                    <a href="{{ url(App\Models\Page::find(3)->slug) }}" class="link">{{ __('pages/contact-us.privacy_policy_message') }}</a>
                </div>
                </div>
            </div>
        </div>
    	<!-- Complete Modal -->
	@endif

<div id="content" class="site-content">
<div class="home-banner-section" style="background-image: url({{ asset('/images/home-banner.jpg') }});">
    <div class="container">     
		<div class="contact-us-section">
			<div class="row ">                
				<div class="col-md-6 offset-md-3 offset-0">    
					<h1 class="title">{{ __('pages/contact-us.title') }}</h1>

					<p class="sub-txt">{{ __('pages/contact-us.description') }}</p>
					<form method="POST" action="{{ route('contact.us') }}" class="contact-us-form">
						@csrf
						<div class="form-group">
							<label for="name" class="cstm-label">{{ __('pages/contact-us.name') }}</label>
							
								<input class="form-control" type="text" name="name" required placeholder="">
								@error('name')
									<div class="error-msg-block text-danger">{{ $message }}</div>
								@enderror	
						</div>
						
						<div class="form-group">
							<label for="headline" class="cstm-label">{{ __('pages/contact-us.email') }}</label>
								<input class="form-control" type="email" name="email" required placeholder="">
								@error('email')
								<div class="error-msg-block text-danger">{{ $message }}</div>
								@enderror		
						</div>

						<div class="form-group">
							<label for="headline" class="cstm-label">{{ __('pages/contact-us.subject') }}</label>
							
								<input class="form-control" type="text" name="subject" required placeholder="">
								@error('subject')
								<div class="error-msg-block text-danger">{{ $message }}</div>
								@enderror		
						</div>
						
						<div class="form-group">
							<label for="comment" class="cstm-label">{{ __('pages/contact-us.message') }}</label>
								<textarea class="form-control" id="message" placeholder=""  required name="message"></textarea>
								@error('message')
								<div class="error-msg-block text-danger">{{ $message }}</div>
								@enderror
						</div>

						<div class="confirm-btn-row text-center">
							<button class="btn confirm-btn submit-contact" type="submit">{{ __('pages/contact-us.submit') }}</button>
						</div>
						<div class="recaptcha-block text-center">
							{!!  GoogleReCaptchaV3::renderField('contact_us_id','contact_us') !!}
							@error('g-recaptcha-response')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</form>
					</div>   
				</div>
			</div>
		</div>
    </div>
</div>
<!-- .row -->
@endsection

@section('js')
{!!  GoogleReCaptchaV3::init() !!}

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#CompleteModal').modal('show');
	});
</script>
@endsection