@extends('layouts.frontend')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Контакты</h1>
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li class="active">Контакты</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<div class="contact-2 content-area-5">
    <div class="container">
        <!-- 3 Cols -->
<section>
    <div class="container">
        <div class="row">
        
            <div class="col-md-4">
                
                <div class="heading-title heading-border-bottom heading-color">
                    <h3>Контакты</h3>
                </div>
                
                <p><b>ООО “AVTOTEXXIZMAT”</b><p>
                <p>Адрес: г. Ташкент, ул. Бунёдкор, 118.<p>
                <p>Телефон: :+99871-279-46-67<p>
                <p>Телефон: +99890-948-0995 (Telegram)<p>
                <p>Email: t-avtotexxizmat@umail.uz</p>

            </div>                  

            <div class="col-md-4">
                <div class="heading-title heading-border-bottom heading-color">
                    <h3>Об автосервисе</h3>
                </div>
                  <p><b>Контакты автосервисы</b><p>
                <p>Начальник ГСТО:  +99871 279-46-70 <p>
                <p>Отдел гарантии:  +99871 279-41-91<p>
                <p>Нач. предприятия СТО-3: +99871 225-60-21 <p>
                <p>Прием заказов: +99871 225-60-23<p>               
            </div>

            <div class="col-md-4">
                <div class="heading-title heading-border-bottom heading-color">
                    <h3>Время работы</h3>
                </div>
                <div class="table-responsive">
            <table class="table table-bordered table-vertical-middle">
                <thead>
                    <tr>
                        <th style="text-align: center;">Дни недели</th>
                        <th style="text-align: center;">Начало работы</th>
                        <th style="text-align: center;">Окончания работы</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Понедельник - Суббота</td>
                        <td style="text-align: center;">08:00</td>
                        <td style="text-align: center;">17:00</td>
                    </tr>
                    <tr>
                        <td>Воскресенье </td>
                        <td  style="text-align: center;" colspan="2">Выходной день</td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
            <div class="col-md-12">
                <div class="map" style="padding-bottom: 50px;padding-top: 50px;">
                    <div id="map" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1745.271390765863!2d69.19044007412225!3d41.255383863742594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd8267647ef009cd6!2z0KHQtdGA0LLQuNGB0L3Ri9C5INCm0LXQvdGC0YAgIkNoZXZyb2xldCI!5e0!3m2!1sru!2s!4v1630667490568!5m2!1sru!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    </div>
</div>

@endsection