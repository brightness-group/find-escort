<script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/jquery-ui.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- cdnjs -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript">
        jQuery('.lazy').Lazy();
</script>
@yield('js')

<script type='text/javascript' src="{{ asset('js/custom.js') }}"></script>

<script>
    $ = jQuery;
    var ENDPOINT = "{{ route('home') }}";
    var page = 1;

    jQuery('.notification-button').on('click', function(){
        if(!jQuery('.notification-content').hasClass('show')){
            page = 1;
            getNotificationMore(page, 'default');
        }
    });

    jQuery('.seemore-li a').on('click', function(e){
        e.preventDefault();
        page++;
        getNotificationMore(page, 'append');
        
    });


    $(document).on('click', '.notification-content.dropdown-menu', function (e) {
      e.stopPropagation();
    });

    function getNotificationMore(page, type = 'default') {
        $('.seemore-li').show();
        $.ajax({
                url: ENDPOINT + "/api/events?page=" + page,
                beforeSend: function () {
                    $('#loading-bar-wrapper').show();
                }
            })
            .done(function (response) {

                /*logic to hide show more option*/
                var enable_pagination =  $(response).filter("#enable_pagination").val(); 
                if( $.trim(enable_pagination) == 'no'){
                    $('.seemore-li').hide();
                }

                $('#loading-bar-wrapper').hide();
                if(type == 'default'){
                    $(".notification-html").html(response);
                }else{
                    $(".notification-html").append(response);
                }
                
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }


    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 0.5 second

    $(document).on('keyup', '#main-search-girl', function(event){
        var $this;
        $this = $(this);
        event.preventDefault();
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function(){ fetch_girls_data('mainGirlSearch', $this) }, doneTypingInterval);
    });

    $(document).on('keydown', '#main-search-girl', function(event){
        clearTimeout(typingTimer);
    });

    function fetch_girls_data( type, $this)
    {
        var query = $('#main-search-girl').val();
        if(query != '')
        {
        $('#loading-bar-wrapper').show();
        $.ajax({
        url:"{{ route('autocomplete.searchgirls') }}",
        method:"POST",
        data:{query:query, _token:"{{ csrf_token() }}"},
        success:function(data){
                $('#loading-bar-wrapper').hide();
                $('#mainSearchGirlsList').fadeIn();  
                $('#mainSearchGirlsList').html(data);
        }
         });
        }
    }
</script>