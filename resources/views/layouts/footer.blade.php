<footer class="footer overview-bgi">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                     <h4>
                        Об автосалоне
                    </h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="text">
                        <p>Предприятие образовано в 1969 году. Основной деятельностью Ташкентского Территориального Акционерного Общества является посредническая деятельность при реализации отечественных автомобилей производства АО «UzAuto Motors», их предпродажная подготовка.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>
                        Контакты
                    </h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>100161, г.Ташкент, проспект Бунёдкор, 118
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:t-avtotexxizmat@umail.uz">t-avtotexxizmat@umail.uz</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+998712794670">+99871 279-46-70 начальник ГСТО</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+998712794667">+99871-279-46-67 Автосалон</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Автомобили
                    </h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <ul class="links">
                        @foreach(App\Models\Car::all() as $car)
                        <li>
                            <a href="{{ action('Frontend\CarController@show', $car->alias) }}"><i class="fa fa-angle-right"></i>Chevrolet {{  $car->name }}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Мы в соц. сетях</h4>
                    <div class="s-border"></div>
                    <div class="m-border"></div>
                    <div class="Subscribe-box">
                        <div class="social-list-2">
                        <ul>
                            <li><a href="http://fb.me/avtotexxizmat.tashkent" target="_blank" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://instagram.com/avtotexxizmat_toshkent" target="_blank" class="twitter-bg"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://t.me/avtotexxizmat_toshkent" target="_blank" class="linkedin-bg"><i class="fa fa-telegram"></i></a></li>
                        </ul>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <p class="copy text-center">©1969 -  <?php  echo date('Y'); ?> | <a href="#">ООО «AVTOTEXXIZMAT»</a> </p>
                </div>
                <div class="col-lg-3">
                    <!-- Yandex.Metrika informer -->
                        <a href="https://metrika.yandex.ru/stat/?id=86301564&amp;from=informer"
                        target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/86301564/3_1_53FFFFFF_33FFFFFF_0_pageviews"
                        style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="86301564" data-lang="ru" /></a>
                        <!-- /Yandex.Metrika informer -->
                </div>

               
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
