@extends('layouts.frontend')

@section('content')

<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <!-- <h1>Chevrolet {{ $item->name }}</h1> -->
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li class="active">Chevrolet {{ $item->name }}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Car details page start -->
<div class="car-details-page content-area-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-md-1">
                <div class="car-details-section">
                  <div class="about-text mb-30">
                         <h3 class="text-center text-uppercase">Chevrolet {{ $item->name }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 border-l border-r">
                            <div class="counter-box-3" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                <div class="icon">
                                    <i class="flaticon-car"></i>
                                </div>
                                <h2>{{ $item->cargo_space }}</h2>
                                <h5>Объем багажника</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-r">
                            <div class="counter-box-3" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                <div class="icon">
                                    <i class="flaticon-manual-transmission"></i>
                                </div>
                                <h2>{{ $item->transmission }}</h2>
                                <h5>Трансмиссия</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-r">
                            <div class="counter-box-3" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                <div class="icon">
                                    <i class="flaticon-fuel"></i>
                                </div>
                                <h2>{{ $item->fuel_consumption }}</h2>
                                <h5>Расход топлива</h5>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-3 col-sm-3 border-r">
                            <div class="counter-box-3" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                <div class="icon">
                                    <i class="flaticon-shield"></i>
                                </div>
                                <h2> @if($item->abs == 1 ) 
                                        ABS
                                    @else
                                        - 
                                    @endif</h2>
                                <h5>Безопасность</h5>
                            </div>
                        </div>                        
                    </div>

                    
                
                    <div class="car-description mb-10">
                        <div class="tab-content">
                                @foreach($item->colors as $key=>$color)
                                    <div class="tab-pane{{ $key == 0 ? ' active': '' }}"  role="tab" aria-controls="one" aria-selected="false" id="c_{{ $color->id }}">
                                    <img class="img-fluid" src="{{ asset(Upload::getFile('car-color', $color->id)) }}" alt="color cars">
                                    </div>
                                @endforeach
                            </div>
                             <div class="tab-box">
                                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                    @foreach($item->colors as $color)
                                        <li class="nav-item" style="padding-left: 10px;">
                                            <a class="nav-link {{ $loop->first ? 'active' : '' }} show" style="background-color:{{ $color->code }};" id="pills-{{ $color->id }}-tab" data-toggle="pill" href="#c_{{ $color->id }}" role="tab" aria-controls="pills-{{ $color->id }}" aria-selected="false"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                     
                        
                    

                    <!-- carDetailsSlider start -->
                    <div id="carDetailsSlider" class="carousel car-details-sliders slide slide-2">
                        <!-- main slider carousel items -->
                        <div class="about-text">
                            <h3>Экстерьер</h3>
                        </div>
                        <div class="car-description mb-10">
                            {!! $item->exterior !!}
                        </div>

                        <div class="carousel-inner">
                            @foreach(Upload::getFiles('exterior', $item->id) as $img)
                            <div class="{{ $loop->first ? 'active' : '' }} item carousel-item" data-slide-number="{{ $loop->index }}">
                                <img style="border-radius: 5px;" src="{{ asset($img) }}" class="img-fluid" alt="#">
                            </div>
                            @endforeach
                        </div>

                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators car-properties list-inline nav nav-justified">
                            @foreach(Upload::getFiles('exterior', $item->id) as $img)
                                <li class="list-inline-item {{ $loop->first ? 'active' : '' }}">
                                    <a id="carousel-selector-{{ $item->id }}" class="selected" data-slide-to="{{ $loop->index }}" data-target="#carDetailsSlider">
                                    <img src="{{ asset($img) }}" class="img-fluid" alt="small-car">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div id="carDetailsSlider1" class="carousel car-details-sliders slide slide-2">
                        <!-- main slider carousel items -->
                        <div class="about-text">
                            <h3>Интерьер</h3>
                        </div>
                        <div class="car-description mb-10">
                            {!! $item->interior !!}
                        </div>

                        <div class="carousel-inner">
                            @foreach(Upload::getFiles('interior', $item->id) as $img)
                            <div class="{{ $loop->first ? 'active' : '' }} item carousel-item" data-slide-number="{{ $loop->index }}">
                                <img style="border-radius: 5px;" src="{{ asset($img) }}" class="img-fluid" alt="#">
                            </div>
                            @endforeach
                        </div>

                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators car-properties list-inline nav nav-justified">
                            @foreach(Upload::getFiles('interior', $item->id) as $img)
                                <li class="list-inline-item {{ $loop->first ? 'active' : '' }}">
                                    <a id="carousel-selector-{{ $item->id }}" class="selected" data-slide-to="{{ $loop->index }}" data-target="#carDetailsSlider1">
                                    <img src="{{ asset($img) }}" class="img-fluid" alt="small-car">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                            

                        <div class="about-text">
                            <h3>Видео</h3>
                        </div>
                        <div class="car-description mb-10">
                            <div class="inside-car">
                              <iframe src="https://www.youtube.com/embed/{{ $item->video }}?autoplay=1" style="border-radius: 15px;" allowfullscreen=""></iframe>
                            </div>
                        </div>

                    <div class="about-text">
                            <h3>Цены и опции</h3>
                        </div>
                        <div class="car-description mb-10">
                             <table class="table table-bordered table-responsive">
                                <tbody>
                                    <tr style="background-color: #528dd4; color: #fff;">
                                        <td class="text-right shop-compare-title col-xs-2 col-sm-2 font-weight-bold text-center" style="vertical-align:middle;">
                                            Позиции
                                        </td>
                                        @foreach($item->positions as $position)
                                        <td style="background-color: #528dd4; color: #fff;" class="text-center shop-compare-title font-weight-bold col-md-2 col-xs-1 col-sm-1" style="color: black;text-align: center;vertical-align: middle;">
                                            {{ $position->name }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td style="background-color: #528dd4; color: #fff;" class="text-center shop-compare-title" style="color: black"><b>Цены</b></td>
                                        @foreach($item->positions as $position)
                                        <td style="background-color: #528dd4; color: #fff;" class="text-center font-weight-bold shop-compare-title col-md-2 col-xs-1 col-sm-1" style="color: black">
                                            {{ number_format($position->cost, 0, 0, ' ') }} cум
                                        </td>
                                        @endforeach
                                    </tr>
                                    @foreach($options as $option)
                                    <tr>
                                        <td  style="background-color: #528dd4; color: #fff;" class="shop-compare-title" style="color: black">{{ $option->name }}</td>
                                        
                                        @foreach($item->positions()->with('options')->get() as $position)

                                        <td class="text-center" style="vertical-align:middle;">
                                            @if($position->options->contains($option->id))
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                            <i class="glyphicon glyphicon-remove text-danger"></i>
                                            @endif
                                        </td>
                                        @endforeach
                                    </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection