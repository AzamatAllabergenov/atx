<!-- Main header start -->
<header class="main-header sticky-header sh-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            
            <a class="navbar-brand company-logo-2" href="{{ route('home') }}">
                <img src="{{ asset('frontend/img/logos/logo-atx.png')}} " alt="logo">
            </a>

            <button class="navbar-toggler" type="button" id="drawer">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="navbar">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Об автосалоне
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                               @foreach(\App\Models\Page::all() as $page)                                      
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="{{ action('Frontend\HomeController@show', $page->alias) }}" style="padding:10px 10px;">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                @endforeach
                           
                        </ul>
                    </li>                     
                    <li class="nav-item dropdown active megamenu-li">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Автомобили</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <div class="megamenu-area">
                                <div class="row">
                                    @foreach(\App\Models\Car::all() as $car)
                                     <div class="col-sm-6 col-md-3 col-lg-3">
                                        <div class="megamenu-section">
                                        <a class="dropdown-item" href="{{ action('Frontend\CarController@show', $car->alias) }}">
                                            <img src="{{ asset(Upload::getThumbFile('car', $car->id, '240x120')) }}" alt="car">
                                            </a>
                                            <h6 class="megamenu-title">Chevrolet {{ $car->name }}</h6>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('price') }}">Прайс лист</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('news') }}">Новости</a>
                    </li>
                     <!--  <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('sale') }}">Акции</a>
                    </li> -->
                    
                    @foreach(\App\Models\Autoservice::all() as $item)                               
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ action('Frontend\AutoserviceController@show', $item->alias) }}">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('autoservice') }}">Автосервис</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('contact') }}">Контакты</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#full-page-search" class="nav-link h-icon">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->