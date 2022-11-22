@extends('master')
@section('css')
<link rel='stylesheet' href="{{ asset('plugins/image-uploader/src/image-uploader.css') }}"  type='text/css' media='all' />
@endsection

@section('content')
<div id="content" class="site-content">
    <div class="container">
        <div class="row m-0">
        <div class="back-page-nav">
                <a href="#" class="prev-page-link"></a> {{__('auth/escorts-register-pictures.label')}}
            </div>
            <div class="account-step-main" style="background-image: url({{ asset('images/information-bg.jpg') }} );">
                <div class="account-step-wrapper">
                    <div class="container">
                        <div class="row m-0">
                            <div class="account-step active">
                                <div class="step-count">1</div>
                                <div class="step-label">{{__('auth/escorts-register-pictures.step_1_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">2</div>
                                <div class="step-label">{{__('auth/escorts-register-pictures.step_2_title')}}</div>
                            </div>
                            <div class="account-step active">
                                <div class="step-count">3</div>
                                <div class="step-label">{{__('auth/escorts-register-pictures.step_3_title')}}</div>
                            </div>
                            <div class="account-step">
                                <div class="step-count">4</div>
                                <div class="step-label">{{__('auth/escorts-register-pictures.step_4_title')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" id="escorts-register-pictures" enctype="multipart/form-data" action="{{ route('escorts.register.pictures') }}">
                    @csrf
                    <div class="information-form-wrapper picture-form-wrapper">
                    <div class="step-title-name">{{__('auth/escorts-register-pictures.title')}}</div>
                        <div class="form-inner-bg">
                            <div class="upload-picture-wrapper">
                                <div class="upload-picture-box">
                                    <div class="upload-picture-title">
                                        <h4>{{__('auth/escorts-register-pictures.upload_pictures')}}</h4>
                                        <span>{{__('auth/escorts-register-pictures.add_upto_ten_photos')}}</span>
                                    </div>
                                    <div class="avatar-upload-wrapper">
                                        <div class="input-pictures" style="width: 100%"></div>

                                        {{--
                                        <div class="preview_pictures"></div>
                                        <div class="avatar-upload control-group file-upload" id="file-upload1">
                                            <div class="image-box text-center">                                    
                                                <img class="lazy" data-src="" alt="">
                                            </div>
                                            <div class="controls" style="display: none;">
                                                <input type="file" name="pictures[]" id="pictures" accept=".jpg,.jpeg.,.gif,.png" multiple="multiple" max="10">    
                                            </div>
                                        </div>
                                        --}}
                                        @error('pictures')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error('pictures.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="upload-picture-box">
                                    <div class="upload-picture-title">
                                        <h4>{{__('auth/escorts-register-pictures.upload_selfie')}}</h4>
                                        <span>{{__('auth/escorts-register-pictures.add_upto_five_photos')}}</span>
                                    </div>
                                    <div class="avatar-upload-wrapper">
                                        <div class="input-selfie" style="width: 100%"></div>
                                        {{--
                                        <div class="preview_selfie"></div>
                                        <div class="avatar-upload file-upload" id="file-upload3">
                                            <div class="image-box text-center">
                                                <img class="lazy" data-src="" alt="">
                                            </div>
                                            <div class="controls" style="display: none;">
                                                <input type="file" name="selfie[]" id="selfie" accept=".jpg,.jpeg.,.gif,.png" multiple="multiple" max="5">
                                            </div>
                                        </div>
                                        --}}
                                        @error('selfie.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="upload-picture-box upload-video-box">
                                    <div class="upload-picture-title">
                                        <h4>{{__('auth/escorts-register-pictures.upload_video')}}</h4>
                                        <span>{{__('auth/escorts-register-pictures.add_upto_one_video')}}</span>
                                    </div>
                                    <div class="avatar-upload-wrapper">
                                        <div class="preview_video" style="display: none;">
                                            <video width="400" controls>
                                                <source src="mov_bbb.mp4" id="video_here">
                                                {{__('auth/escorts-register-pictures.browser_does_not_support')}}
                                            </video>
                                        </div>
                                        <div class="video-uploader-div">
                                            <div class="fileuploader-btn video_uploader_btn">{{__('auth/escorts-register-pictures.select_video_file')}}</div>
                                            <input type="file" name="video" id="video_uploader" accept="video/*" style="display: none;">
                                        </div>
                                        @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                   <div class="see-rule more-detail">
                                <span>{{__('auth/escorts-register-pictures.see_the_rules')}}</span>
                            </div>
                            </div>
                         
                        </div>
                        <div class="privacy-wrapper">
                            <div class="mob-fix-bottom">
                                <button type="submit" class="btn">{{__('auth/escorts-register-pictures.continue_button')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="boost-more-detail-popup">
    <div class="boost-more-detail-popup-bg">
        {!! __('auth/escorts-register-pictures.popup_html') !!}
    </div>
</div>
@endsection

@section('js')
<script type='text/javascript' src="{{ asset('plugins/image-uploader/src/image-uploader.js') }}"></script>
<script type="text/javascript">
    $ = jQuery;
    $('.picture-form-wrapper .more-detail').on('click', function(){
        $(".boost-more-detail-popup").show();
    });
    
    $('body').click(function(e) {
        if (!$(e.target).closest('.boost-more-detail-popup-bg').length && !$(e.target).closest('.picture-form-wrapper .more-detail').length ){
            $(".boost-more-detail-popup").hide();
        }
    });
    
    $('.input-pictures').imageUploader({
        label:'',
        imagesInputName: 'pictures',
        maxFiles : 10
    });

    $('.input-selfie').imageUploader({
        label:'',
        imagesInputName: 'selfie',
        maxFiles : 5
    });
</script> 
@endsection