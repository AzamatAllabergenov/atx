<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>ООО «AVTOTEXXIZMAT» - Предприятие образовано в 1969 году. Основной деятельностью Ташкентского Территориального Акционерного Общества является посредническая деятельность при реализации отечественных автомобилей производства АО «UzAuto Motors», их предпродажная подготовка</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Предприятие образовано в 1969 году. Основной деятельностью Ташкентского Территориального Акционерного Общества является посредническая деятельность при реализации отечественных автомобилей производства АО «UzAuto Motors», их предпродажная подготовка">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-submenu.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-select.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/font-awesome/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/linearicons/style.css') }} ">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/dropzone.css') }} ">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/slick.css') }} ">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/lightbox.min.css') }} ">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend/css/jnoty.css') }} ">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sidebar.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend/css/skins/yellow.css') }} ">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon/favicon@4x.png') }} " type="image/x-icon" >

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700%7CUbuntu:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{  asset('frontend/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="{{ asset('frontend/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(86301564, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86301564" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

   

</head>
<body>
<div class="page_loader"></div>

@include('layouts.header')

@include('layouts.menu')

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        
        <div class="sidebar-logo">
            <a href="{{ route('home') }}">
                 <img src="{{ asset('frontend/img/logos/logo-atx.png')}} " alt="logo">
            </a>
        </div>

        <div class="sidebar-navigation">
            <h3 class="heading">Автосалон «AVTOTEXXIZMAT»</h3>
            <ul class="menu-list">
                <li><a href="#" class="active pt0">Об автосалоне <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        @foreach(\App\Models\Page::all() as $page) 
                            <li><a href="{{ action('Frontend\HomeController@show', $page->alias) }}"> {{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#">Автомобили <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        @foreach(\App\Models\Car::all() as $car)
                        <li>
                            <a href="#">Chevrolet {{ $car->name }}</a>
                        </li>
                       @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('price') }}">Прайс лист</a>
                </li>
                <li><a href="{{ route('news') }}">Новости</a>
                </li>
                 @foreach(\App\Models\Autoservice::all() as $item)                               
                    <li>
                        <a href="{{ action('Frontend\AutoserviceController@show', $item->alias) }}">
                            {{ $item->title }}
                        </a>
                    </li>
                @endforeach

                <li>
                    <a href="{{ route('contact') }}">Контакты</a>
                </li>
            </ul>
        </div>
        <div class="get-in-touch">
            <h3 class="heading">наши контакты</h3>
            <div class="media">
                <i class="flaticon-phone"></i>
                <div class="media-body">
                    <a href="tel:+998712794667">+99871-279-46-67</a>
                </div>
            </div>
            <div class="media">
                <i class="flaticon-mail"></i>
                <div class="media-body">
                    <a href="mailto:t-avtotexxizmat@umail.uz">t-avtotexxizmat@umail.uz</a>
                </div>
            </div>
            <div class="media mb-0">
                <i class="flaticon-earth"></i>
                <div class="media-body">
                    <a href="https://avtotexxizmat.uz/">www.avtotexxizmat.uz</a>
                </div>
            </div>
            <div class="media mt-2">
                <i class="flaticon-pin"></i>
                <div class="media-body">
                    <a href="">100161, г.Ташкент, проспект Бунёдкор, 118</a>
                </div>
            </div>
        </div>
        <div class="get-social">
            <h3 class="heading">Мы в соц. сетях</h3>
            <a href="http://fb.me/avtotexxizmat.tashkent" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://t.me/avtotexxizmat_toshkent" class="twitter-bg">
                <i class="fa fa-telegram"></i>
            </a>
            <a href="https://instagram.com/avtotexxizmat_toshkent" class="google-bg">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
</nav>
<!-- Sidenav end -->

@yield('content')

@include('layouts.footer')

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="https://storage.googleapis.com/theme-vessel-items/checking-sites/autocar-html/HTML/main/index.html#">
        <input type="search" value="" placeholder="Напишите какой автомобиль интересует..." />
        <button type="submit" class="btn btn-sm button-theme">Поиск</button>
    </form>
</div>





<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

<script  src="{{ asset('frontend/js/jquery-2.1.4.min.js') }}"></script>
<!-- <script  src="{{ asset('frontend/js/jquery-2.2.0.min.js') }}"></script> -->    
<script  src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script  src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- <script  src="{{ asset('frontend/bootstrap.min.js') }}"></script> -->  
<script  src="{{ asset('frontend/js/bootstrap-submenu.js')}}"></script>
<script  src="{{ asset('frontend/js/rangeslider.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.mb.YTPlayer.js') }} "></script>
<script  src="{{ asset('frontend/js/bootstrap-select.min.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.easing.1.3.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.scrollUp.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }} "></script>
<script  src="{{ asset('frontend/js/dropzone.js') }} "></script>
<script  src="{{ asset('frontend/js/slick.min.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.filterizr.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.countdown.js') }} "></script>
<script  src="{{ asset('frontend/js/jquery.mousewheel.min.js') }} "></script>
<script  src="{{ asset('frontend/js/lightgallery-all.js') }} "></script>
<script  src="{{ asset('frontend/js/jnoty.js')}}  "></script>
<script  src="{{ asset('frontend/js/sidebar.js') }} "></script>
<script  src="{{ asset('frontend/js/app.js') }} "></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="{{ asset('frontend/js/ie10-viewport-bug-workaround.js') }} "></script>
<!-- Custom javascript -->
<script  src="{{ asset('frontend/js/ie10-viewport-bug-workaround.js') }} "></script>

@yield('script')

</body>

</html>
