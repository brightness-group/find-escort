<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-199955235-1">

        </script>

        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-199955235-1');
        </script>
        
        @include('partials.meta')
        @include('partials.prologue')
    </head>
    
    <!-- Complete Modal -->
    <div class="modal fade complete-modal" id="CompleteModal" tabindex="-1" role="dialog" aria-labelledby="CompleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                    <div class="success-icon"></div>    
            </div>
            <div class="modal-body">
                    <div class="popup-text-msg">
                    <p>You are UNDER 18.</p>
                    <p>Please exit the website immediately.</p>
                    </div>           
            </div>
            <div class="modal-footer text-center">
                <a href="https://www.google.com/" class="btn" >EXIT</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Complete Modal -->

    <body class="confirm-your-age-page" style="background-image: url({{ asset('images/coming-soon/bg.png')}});">
        <div class="confirm-your-age-wrapper">
            <div class="confirm-your-age-header">
                <div class="container">
                    <div class="row m-0">
                        <div class="logo"><a href="{{ route('home') }}" title=""><img class="lazy" data-src="{{ asset('images/logo.png') }}" alt=""></a></div>
                    </div>
                </div>
            </div>
            <div class="confirm-your-age-text">
                <div class="container">
                    <form method="post" action="{{ route('confirm.age') }}">
                        @csrf
                        <div class="row m-0">
                            <h2>{{__('confirm-your-age.title')}}</h2>
                            <p>{{__('confirm-your-age.description')}}</p>
                            <input type="hidden" name="confirm_your_age" value="confirmed" id="confirm-your-age">
                            <div class="btn-group-cstm">
                                <button type="submit" class="btn btn-pink-white">{{__('confirm-your-age.yes')}}</button>
                                <button type="button" class="btn btn-no btn-pink-white">{{__('confirm-your-age.no')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#loading-bar-wrapper').hide();
            jQuery('.btn-no').click(function(){
                jQuery('#CompleteModal').modal('show');
            });
        });
    </script>
</html>
