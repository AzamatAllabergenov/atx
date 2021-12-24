@extends('layouts.frontend')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Об автосалоне</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li class="active">Об автосалоне</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- About car start -->
<div class="about-car">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>{{ $item->title }}</h3>
                    <p> {!! $item->text !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection