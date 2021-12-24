@extends('layouts.frontend')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Новости</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Главная</a></li>
                <li class="active">Все новости</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            @foreach($items as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-image">
                          @if (Upload::hasFile('news', $item->id))
                            <img class="img-responsive" src="{{ asset(Upload::getThumbFile('news', $item->id, '350x252')) }}" alt="{{ $item->title }}" alt="blog-1" class="img-fluid">
                            @else
                            <img class="img-responsive" src="{{ asset('assets/images/news/noimage.jpg') }}">
                            @endif
                        
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">#Avtotexxizmat</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-comment"></i></a>1k</li>
                                <li class="float-right"><a href="#"><i class="flaticon-calendar"></i></a>{{ $item->created_at->format('d/m/Y') }}</li>
                            </ul>
                        </div>
                        <h4>
                            <a href="{{ action('Frontend\NewsController@show', $item->alias) }}">{{ $item->title }}</a>
                        </h4>
                        <p>{{ $item->short_text }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Page navigation start -->
        <div class="pagination-box hidden-mb-45 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- Blog body end -->




@endsection