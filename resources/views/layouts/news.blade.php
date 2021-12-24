<!-- Blog start -->
<div class="blog content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Новости и акции</h1>
            <p style="font-style: italic;">Последные новости и акции!</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
               <div class="row">
        @foreach($news as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-image">
                          @if (Upload::hasFile('news', $item->id))
                            <img class="img-responsive" src="{{ asset(Upload::getThumbFile('news', $item->id, '350x252')) }}" alt="{{ $item->title }}" class="img-fluid bp">
                            @else
                            <img src="{{ asset('frontend/img/blog/blog-1.jpg') }}" alt="blog-1" class="img-fluid bp">
                            @endif 
                        
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Акция</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-comment"></i></a>17K</li>
                                <li class="float-right"><a href="#"><i class="flaticon-calendar"></i></a>{{ $item->created_at->format('d.m.Y') }}</li>
                            </ul>
                        </div>
                        <h4>
                            <a href="{{ action('Frontend\NewsController@show', $item->alias) }}">
                            {{ $item->title }}</a>
                        </h4>
                        <p style="text-align: justify;">{{ $item->short_text }}</p>
                    </div>
                </div>
            </div>
        @endforeach
<!-- 
                @foreach($news as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-1">
                        <div class="blog-image">
                            @if (Upload::hasFile('news', $item->id))
                            <img class="img-responsive" src="{{ asset(Upload::getThumbFile('news', $item->id, '200x200')) }}" alt="{{ $item->title }}" class="img-fluid bp">
                            @else
                            <img class="img-responsive" src="{{ asset('assets/images/news/noimage.jpg') }}" alt="" class="img-fluid bp">
                            @endif                            
                            <div class="date-box-2 db-2">{{ $item->created_at->format('d.m.Y') }}</div>
                           
                        </div>
                        <div class="detail">
                            <h3>
                                <a href="{{ action('Frontend\NewsController@show', $item->alias) }}">{{ $item->title }}</a>
                            </h3>
                            <p>{{ $item->short_text }}</p>
                            <a href="{{ action('Frontend\NewsController@show', $item->alias) }}" class="b-btn">Подробнее</a>
                        </div>
                    </div>
                </div>
                @endforeach -->
            </div>
        </div>
    </div>
</div>