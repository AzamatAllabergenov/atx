<!-- Featured car start -->
<div class="featured-car content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>ваш автомобиль здесь</h1>
            <p style="font-style: italic;">Вы можете купить автомобили Chevrolet в нашем автосалоне!</p>
        </div>
    <div class="row">
        @foreach($cars as $car) 
            <div class="col-lg-3 col-md-6 col-sm-3">
                <div class="car-box-3">
                
                    <div class="car-thumbnail">
                        <a href="{{ action('Frontend\CarController@show', $car->alias) }}" class="car-img">
                            <div class="tag-2 bg-active">{{ $car->name }}</div>
                            <div class="price-box">
                                <!-- <span>от 369 000 000 сум</span> -->
                            </div>
                            <img class="d-block w-100" src="{{ asset(Upload::getThumbFile('car', $car->id, '240x120')) }}" alt="car">
                        </a>
                    </div>
                    
                    <div class="detail">
                        <h1 class="title">
                            <a href="{{ action('Frontend\CarController@show', $car->alias) }}">Chevrolet {{ $car->name }}</a>
                        </h1>
                        <hr>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-car"></i> {{ $car->cargo_space }}
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> {{ $car->fuel_consumption }}
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> {{ $car->transmission }}
                            </li>
                            <li>
                                <i class="flaticon-shield"></i> 
                                    @if( $car->abs  == 1 ) ABS @else -  @endif
                            </li>
                        </ul>
                    </div>
                    
                    <div class="footer clearfix">
                           <a  href="{{ action('Frontend\CarController@show', $car->alias) }}" class="btn button-theme btn-block">Подробно</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>