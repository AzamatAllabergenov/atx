@extends('layouts.frontend')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Новости</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home')}}">Главная</a></li>
                <li class="active">{{ $item->title }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog body start -->
<div class="blog-body content-area-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Blog 1 start -->
                <div class="blog-1 blog-big mb-50">
                    <div class="blog-photo">
                        @if (Upload::hasFile('news', $item->id))
                        <img class="img-responsive" class="img-fluid" src="{{ asset(Upload::getThumbFile('news', $item->id, '730x525')) }}" alt="">
                        @else
                            <img class="img-responsive" src="{{ asset('assets/images/news/noimage.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="detail">
                        <h3>
                            <a href="#">{{ $item->title }}</a>
                        </h3>
                        <p>{!! $item->text !!}</p>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="blog-tags">
                                    <span>Теги</span>
                                    <a href="#">автотеххизмат</a>
                                    <a href="#">автосалон</a>
                                    <a href="#">новости</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="blog-social-list">
                                    <span>Поделиться</span>
                                    <a href="#" class="facebook-bg">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                   
                                    <a href="#" class="google-bg">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Search box -->
                    
                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h3 class="sidebar-title">Top-5 Новости</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        @foreach($tops as $item)
                        <div class="media mb-4">
                            <a class="pr-3" href="car-details.html">
                                @if (Upload::hasFile('news', $item->id))
                                    <img class="media-object" src="{{ asset(Upload::getThumbFile('news', $item->id, '350x252')) }}" width="70" alt="">
                                @else
                                    <img class="img-responsive" src="{{ asset('assets/images/news/noimage.jpg') }}" alt="news photo">
                                @endif
                            </a>
                            <div class="media-body align-self-center">
                                <h6 style="font-size:14px;">
                                    <a href="car-details.html">{{ $item->title }}</a>
                                </h6>
                                <div class="listing-post-meta">
                                <a href="#"><i class="fa fa-calendar"></i> {{ $item->created_at->format('d.m.Y') }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog body end -->




@endsection