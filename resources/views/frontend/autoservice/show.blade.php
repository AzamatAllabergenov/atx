@extends('layouts.frontend')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Автосервис</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li class="active">Об автосервис</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->


<!-- services-2 start -->
<div class="services-2 content-area">
    <div class="container">
        <div class="service-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                        <div class="best-used-car">
                            <h3>{{ $item->title }}</h3>
                            <p>{!! $item->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">1</div>
                    <div class="icon">
                      <!--   <div class="icon-inner">
                            <i class="flaticon-support-2"></i>
                        </div> -->
                    </div>
                    <h2 class="font-weight-bold">
                        <a href="services.html">Компьютерная диагностика</a>
                    </h2>
                    <p>Мы предлагаем услугу качественного ремонта двигателей для автомобилей марки Chevrolet и другие. Наше преимущество в высоком качестве работы при оптимальных сроках и в современных оборудованиях.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">2</div>
                    <div class="icon">
                        <!-- <div class="icon-inner">
                            <i class="flaticon-speed"></i>
                        </div> -->
                    </div>
                     <h2 class="font-weight-bold">
                        <a href="services.html">Кузовной ремонт и покраска</a>
                    </h2>
                    <p>Наш центр оснащен новым оборудованием, благодаря чему мы готовы выполнить ремонт авто любой сложности: от устранения мелких сколов или царапин до серьезного ремонта основных узлов автомобиля.</p>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">3</div>
                    <div class="icon">
                       <!--  <div class="icon-inner">
                            <i class="flaticon-wheel"></i>
                        </div> -->
                    </div>
                     <h2 class="font-weight-bold">
                        <a href="services.html">Электротехнические услуги</a>
                    </h2>
                    <p>Можете спокойно доверять ремонт своих автомобилей проверенным и опытным Мастерам нашего сервис центра. У нас современные подходы к повышению качества сервиса и услуг. Абсолютно все проверено временем!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">4</div>
                    <div class="icon">
                        <!-- <div class="icon-inner">
                            <i class="flaticon-motor"></i>
                        </div> -->
                    </div>
                      <h2 class="font-weight-bold">
                        <a href="services.html">Балансировка колес</a>
                    </h2>
                    <p>Это именно жизненно важное, как бы пафосно это не звучало. От правильной балансировки зависит не только правильная работа подвески автомобиля, ее долговечность, комфорт езды, безопасность водителя и пассажиров, но и их жизнь. И с нами это легко!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">5</div>
                    <div class="icon">
                        <!-- <div class="icon-inner">
                            <i class="flaticon-air-conditioner"></i>
                        </div> -->
                    </div>
                     <h2 class="font-weight-bold">
                        <a href="services.html">Замена фильтра и масла</a>
                    </h2>
                    <p>Мы предлагаем своим клиентам не только замену масла, но и комплекс сопутствующих услуг, таких как установка нового фильтра. Ведь, своевременная замена масла, а также фильтра в моторе автомобиля — это гарантия нормального функционирования вашей машины.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single-info">
                    <div class="number">6</div>
                    <div class="icon">
                      <!--   <div class="icon-inner">
                            <i class="flaticon-fuel"></i>
                        </div> -->
                    </div>
                      <h2 class="font-weight-bold">
                        <a href="services.html">Автомойка</a>
                    </h2>
                    <p>Мы желаем своим клиентам полный комфорт, и для этого наш центр предлагает Вам комплекс косметических процедур, направленных на устранение грязевых отложений на кузове и в салоне автомобиля. Качественно, приемлемо и удобно!</p>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- services-2 end -->

@endsection