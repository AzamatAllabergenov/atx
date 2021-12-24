@extends('layouts.frontend')

@section('content')

<div class="sub-banner">
    <div class="container breadcrumb-area">
        <div class="breadcrumb-areas">
            <h1>Прейскурант</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Главная</a></li>
                <li class="active">Прейскурант</li>
            </ul>
        </div>
    </div>
</div>


<div class="pricing-tables content-area">
    <div class="container">
      <div style="background-color: #fff; padding: 20px;">
        <!-- Main title -->
        <div class="main-title text-center">
            <h4>Прайс лист</h4>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p> -->
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <table class="table table-bordered text-center table-hover">
                  <thead style="background-color: #528dd4; color: #fff;">
                    <tr>
                      <th scope="col">Наименование автомобиля</th>
                      <th scope="col" colspan="4">Модель / Цена (сум)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr> 
                      <td style="vertical-align: middle;" rowspan="2" class="font-weight-bold">Chevrolet Damas | Labo</td>
                      <td class="font-weight-bold">DLX</td>
                      <td class="font-weight-bold">LABO</td>
                      <td class="font-weight-bold">VAN</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">78 283 000</td>
                      <td style="background-color:#ddd;">79 198 000</td>
                      <td style="background-color:#ddd;">75 928 000</td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Spark</td>
                      <td class="font-weight-bold">LS M/T</td>
                      <td class="font-weight-bold">LS M/T Optimum Plus</td>
                      <td class="font-weight-bold">LT A/T</td>
                      <td class="font-weight-bold">LT A/T Elegant Plus</td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">73 477 000</td>
                      <td style="background-color:#ddd;">75 706 000</td>
                      <td style="background-color:#ddd;">92 821 000</td>
                      <td style="background-color:#ddd;">94 538 000</td>
                    </tr>


                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Nexia</td>
                      <td class="font-weight-bold">LT M/T</td>
                      <td class="font-weight-bold">LT M/T Optimum Plus</td>
                      <td class="font-weight-bold">LTZ A/T</td>
                      <td class="font-weight-bold">LTZ A/T Elegant Plus</td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">87 320 000</td>
                      <td style="background-color:#ddd;">89 916 000</td>
                      <td style="background-color:#ddd;">106 429 000</td>
                      <td style="background-color:#ddd;">109 025 000</td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Cobalt</td>
                      <td class="font-weight-bold">LТ M/T Plus</td>
                      <td class="font-weight-bold">LТZ A/T Plus</td>
                      <td class="font-weight-bold"></td>
                      <td ></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">97 083 000</td>
                      <td style="background-color:#ddd;">116 495 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Lacetti</td>
                      <td class="font-weight-bold">SX</td>
                      <td class="font-weight-bold">SX M/T Comfort Plus</td>
                      <td class="font-weight-bold">CDX A/T Elegant Plus</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">114 449 000</td>
                      <td style="background-color:#ddd;">115 607 000</td>
                      <td style="background-color:#ddd;">138 126 000</td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Lacetti с ГБО</td>
                      <td class="font-weight-bold">SX</td>
                      <td class="font-weight-bold">SX CNG Plus</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">123 287 000</td>
                      <td style="background-color:#ddd;">124 445 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Malibu 2</td>
                      <td class="font-weight-bold">LTZ 2.0л (турбо) с люком</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">369 000 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Tracker</td>
                      <td class="font-weight-bold">1.8 л. LT M/Т</td>
                      <td class="font-weight-bold">1,8 л. Premier A/Т</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">189 838 121</td>
                      <td style="background-color:#ddd;">222 150 992</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Tracker 2</td>
                      <td class="font-weight-bold">1.0T LT AT FWD</td>
                      <td class="font-weight-bold">RedLine 1.0T LT AT FWD</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">232 000 000</td>
                      <td style="background-color:#ddd;">240 000 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                   

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Trailblazer</td>
                      <td class="font-weight-bold">LTZ 6АT</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">398 000 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Equinox</td>
                      <td class="font-weight-bold">2,0L Тurbo LT 9АT</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">414 000 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Traverse</td>
                      <td class="font-weight-bold">Premier AT</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">596 000 000</td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                      <td style="background-color:#ddd;"></td>
                    </tr>

                    <tr> 
                      <td class="font-weight-bold" style="vertical-align: middle;" rowspan="2">Chevrolet Tahoe</td>
                      <td class="font-weight-bold">Premier AT</td>
                      <td class="font-weight-bold">TAHOE-LT R20 c люком</td>
                      <td class="font-weight-bold">TAHOE-LT R20</td>
                      <td class="font-weight-bold">TAHOE-LT</td>
                    </tr>
                    <tr>
                      <td style="background-color:#ddd;">795 000 000</td>
                      <td style="background-color:#ddd;">755 000 000</td>
                      <td style="background-color:#ddd;">745 000 000</td>
                      <td style="background-color:#ddd;">735 000 000</td>
                    </tr>

                  </tbody>
                </table>
                <p class="font-weight-bold">S - стандартная входит на базовом комплектации</p>
            </div>  
        </div>    
      </div>
    </div>
</div>


@endsection