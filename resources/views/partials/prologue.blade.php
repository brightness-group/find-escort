<link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" type='text/css' media='all' />
@yield('css')

<link rel='stylesheet' href="{{ asset('css/style.css') }}" type='text/css' media='all' />

<style>
    .preview_pictures img, .preview_selfie img {
    max-width: 100%;
    width: 100px;
    position: relative;
    height: 100px;
    border-radius: 5px;
    padding: 5px;
    }
    div.error{
    margin: 8px 0px;
    color: #D8000C;
    background-color: #FFBABA;
    }

    h1.heading {
         font-family: "Parisienne", cursive; 
         font-weight: normal; 
         color: #FFFFFF; 
         font-size: 35px; 
         line-height: 42px; 
         text-shadow: none; 
    }
    h1.title {
        font-family: "Parisienne", cursive;
        font-weight: normal;
        text-shadow: none;
    }
    .login-main-section .login-wrapper .login-box .login-box-inner h1 {
        text-align: center;
        color: #000000;
        margin-bottom: 30px;
        font-size: 30px;
        line-height: 35px;
    }
    .login-main-section .login-wrapper .login-box.my-account-box .login-box-inner h1 {
        color: #FFFFFF;
        margin-bottom: 30px;
        font-size: 30px;
        line-height: 35px;
    }

    .product-detail-middle .product-detail-left .product-detail-title h1 {
        font-size: 40px;
        line-height: 50px;
        text-transform: capitalize;
    }
</style>