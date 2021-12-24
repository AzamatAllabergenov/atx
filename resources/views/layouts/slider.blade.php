Banner start -->
<div class="banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            @foreach($sliders as $key=>$slider)
            
            <div class="{{ $loop->first ? 'active' : '' }} carousel-item banner-max-height item-bg">
                
                @if(Upload::hasFile('slider-'.App::getLocale(), $slider->id))
                <img class="d-block w-100" src="{{ asset(Upload::getThumbFile('slider-'.App::getLocale(), $slider->id, '1920x705')) }}" alt="banner">
                @endif

                <div class="carousel-content container banner-info-2 bi-2">
                    <!-- <h2>chevrolet malibu</h2> -->
                    <!-- <p>CHEVROLET MALIBU AVTOMOBILI BILAN MAKSIMAL QULAYLIK!</p> -->
                  <!--   <a class="btn-3 btn-defaults" href="{{ $slider->url }}">
                        Более подробнее <i class="arrow"></i>
                    </a> -->
                </div>
            </div>
            @endforeach
        
        </div>

        <a class="carousel-control-prev none-580" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>

        <a class="carousel-control-next none-580" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>

    </div>
</div>
<!-- Banner end