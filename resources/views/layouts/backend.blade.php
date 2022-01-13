<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ООО "AVTOTEXXIZMAT" - Админ управления 2022</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    <link rel="stylesheet" href="{{ asset('backend/scss/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon/favicon@4x.png') }} " type="image/x-icon" >

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    @yield('styles')

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                     <img src="{{ asset('frontend/img/logos/logo-atx.png')}} " alt="logo">
                </a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('backend/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Автомобили</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{ action('Backend\CarController@index') }}"> <i class="menu-icon fa fa-car"></i> Автомобили</a>
                    </li>
                    <li>
                        <a href="{{ action('Backend\FeatureController@index') }}"> <i class="menu-icon fa fa-cogs"></i> Тех. характеристики</a>
                    </li>
                    <li>
                        <a href="{{ action('Backend\FeatureGroupController@index') }}"> <i class="menu-icon fa fa-folder-open"></i> Группы
                             тех. характ.</a>
                    </li>
                    <li>
                        <a href="{{ action('Backend\OptionController@index') }}"> <i class="menu-icon fa fa-check"></i> Опции</a>
                    </li>
                    <h3 class="menu-title">Странции</h3>
                    <li>
                        <a href="{{ action('Backend\NewsController@index') }}"> <i class="menu-icon fa fa-book"></i> Новости</a>
                    </li>

                    <li>
                        <a href="{{ action('Backend\PageController@index') }}"> <i class="menu-icon fa fa-file"></i> Cтраницы</a>
                    </li>

                    <li>
                        <a href="{{ action('Backend\GalleryController@index') }}"> <i class="menu-icon fa fa-image"></i> Галерея</a>
                    </li>


                    <li>
                        <a href="{{ action('Backend\AutoserviceController@index') }}"> <i class="menu-icon fa fa-cogs"></i> Автосервис</a>
                    </li>

                    <li>
                        <a href="{{ action('Backend\PromotionController@index') }}"> <i class="menu-icon fa fa-cut"></i> Акции</a>
                    </li>

                     <li>
                        <a href="{{ action('Backend\FaqController@index') }}"> <i class="menu-icon fa fa-question-circle"></i> FAQ</a>
                    </li>
                    <li>
                        <a href="{{ action('Backend\SliderController@index') }}"> <i class="menu-icon fa fa-image"></i> Слайдер</a>
                    </li>
                    <h3 class="menu-title">Файлы</h3>
                    <li>
                        <a href="{{ action('Backend\PageController@fm') }}"> <i class="menu-icon fa fa-file"></i> Файл менеджер</a>
                    </li>
                    <h3 class="menu-title">Пользователи</h3>
                    <li>
                        <a href="{{ action('Backend\UserController@index') }}"> <i class="menu-icon fa fa-user"></i> Пользователи</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-2x fa-sign-out"></i>
                        </a>

                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        @if(request()->session()->has('success'))
            <div class="container">   
                <div class="alert alert-success">
                    {{ request()->session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="container">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/tinymce/tinymce.min.js') }}"></script>

     <script type="text/javascript">
      tinymce.init({
            selector: ".redactor",
            theme: "silver",
            height:400,
            plugins:[
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
                  ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            content_css: '//www.tinymce.com/css/codepen.min.css',
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",

            file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            
            tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                callback(message.content, { text: message.text })
                }
            })
        }
    });
</script>
 <script type="text/javascript">
        function myAjax() {
              $.ajax({
                   type: "POST",
                   url: '{{ route("is_compact") }}',
                   success:function(html) {
                     alert(html);
                   }
              });
         }
    </script>

    
    
    @yield('scripts')

</body>
</html>
    