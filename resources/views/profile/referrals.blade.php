@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Привлечено рефералов</h6>
                        <h2 style="color:#fa6801;">{{ count(\App\Models\User::where('referral', \Illuminate\Support\Facades\Auth::id())->get()) }}<span style="font-size:18px;"></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Ваш статус</h6>
                        <h2 style="">
                            @php
                            $referrals = count(\App\Models\User::where('referral', \Illuminate\Support\Facades\Auth::id())->get());

                            if ($referrals >= 0) {
                                echo "<span style='color:#c0c0c0;'>Silver</span>";
                            } elseif($referrals >= 3) {
                                echo "<span style='color:#ffd700;'>Gold</span>";
                            } elseif($referrals >= 6) {
                                echo "<span style='color:#828282;'>Platinum</span>";
                            } elseif($referrals >= 7) {
                                echo "<span style='color:#50c878;'>Emerald</span>";
                            }elseif($referrals >= 8){
                                echo "<span style='color:red;'>Ruby</span>";
                            }elseif($referrals >= 9){
                                echo "<span style='color:#3b96d6;'>Diamond</span>";
                            }elseif($referrals >= 12){
                                echo "<span style='color:#5CC5CD;'>Blue diamond</span>";
                            }elseif($referrals >= 15){
                                echo "<span style='color:#215e75c2;'>Black diamond</span>";
                            }else{
                                echo "<span style='color:#000;'>Start</span>";
                            }
                            @endphp

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Условия</strong> партнёрской программы</h2>
                    </div>
                    <div class="body conditions">
                        <p class="mb-0"><?php //if($prices >= 15000) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>';?> Сумма личных инвестиций достигает 15 000 рублей</p>
                        <p class="mb-0"><?php //if(mysqli_num_rows($referalex) > 0) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>';?> Вы пригласили реферала</p>
                        <p class="mb-0"><?php //if($refprices >= 15000) echo '<i class="fas fa-check"></i>'; else echo '<i class="fas fa-times"></i>';?> Ваш реферал инвестировал более 15 000 рублей</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">

                <div class="card">
                    <div class="header">
                        <h2><strong>Промокод</strong> для рефералов</h2>
                    </div>

                    <div class="body">
                        <p>Ваш код приглашения</p>

                        <input type="text" value="" class="form-control" disabled>
                        <br>
                        <!--  <div class="text-right js-sweetalert">
                             <button class="btn btn-danger waves-effect success btn-raised" onclick="generateCodeAlert();">Сгенерировать новый</button>
                             <button class="btn btn-primary waves-effect success btn-raised" onclick="alertGenerate('Промокод успешно скопирован!', 'success');">Скопировать промокод</button>
                         </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Ссылка</strong> для рефералов</h2>
                    </div>

                    <div class="body">
                        <p>Ваша реферальная ссылка</p>

                        <input type="text" class="form-control" value="" disabled>
                        <br>
                        <!--div class="text-right js-sweetalert">
                            <button class="btn btn-primary waves-effect" onclick="alertGenerate('Ссылка успешно скопирована!', 'success');">Скопировать ссылку</button>
                        </div-->
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Как пригласить друзей?</strong></h2>
                    </div>

                    <div class="body">
                        <p style="font-size: 17px;line-height: 22px;margin-bottom: 0px;">Скопируйте ссылку, отправьте ее другу по почте или SMS,
                            сообщением в любимом мессенджере или просто
                            разместите информацию у Вас на стене в социальной
                            сети и напишите пригласительный код!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12" id="referalstag">
                <div class="card">
                    <div class="header">
                        <h2><strong>Заметка</strong> к списку</h2>
                    </div>
                    <div class="body conditions">
                        <p><i class="fas fa-times"></i> - Реферал не выполнил условия</p>
                        <p><i class="fas fa-check"></i> - Реферал выполнил часть условий</p>
                        <p class="mb-0"><i class="fas fa-check-double"></i> - Реферал выполнил все условия</p>
                        <br><p>Общая сумма инвестиций: </p>
                    </div>
                </div>

                <!--
                    Шапка вкладок
                -->
                <div class="card">
                    <div class="header">
                        <h2><strong>Список</strong> рефералов</h2>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs" style="display: flex; justify-content: space-between;">
                            <li class="nav-item start"><a class="nav-link active" data-toggle="tab" href="#start"><i class="fas fa-gem"></i> Start</a></li>
                            <!--li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Отзывы</a></li-->
                            <li class="nav-item silver"><a class="nav-link" data-toggle="tab" href="#silver"><i class="fas fa-gem"></i> Silver</a></li>
                            <li class="nav-item gold"><a class="nav-link" data-toggle="tab" href="#gold"><i class="fas fa-gem"></i> Gold</a></li>
                            <li class="nav-item platinum"><a class="nav-link" data-toggle="tab" href="#platinum"><i class="fas fa-gem"></i> Platinum</a></li>
                            <li class="nav-item emerald"><a class="nav-link" data-toggle="tab" href="#emerald"><i class="fas fa-gem"></i> Emerald</a></li>
                            <li class="nav-item ruby"><a class="nav-link" data-toggle="tab" href="#ruby"><i class="fas fa-gem"></i> Ruby</a></li>
                            <li class="nav-item diamond"><a class="nav-link" data-toggle="tab" href="#diamond"><i class="fas fa-gem"></i> Diamond</a></li>
                            <li class="nav-item blue_diamond"><a class="nav-link" data-toggle="tab" href="#blue_diamond"><i class="fas fa-gem"></i> Blue diamond</a></li>
                            <li class="nav-item black_diamond"><a class="nav-link" data-toggle="tab" href="#black_diamond"><i class="fas fa-gem"></i> Black diamond</a></li>
                        </ul>
                    </div>
                </div>


                <!--
                    Вкладки
                -->

                <div class="tab-content">
                    <div class="tab-pane active" id="start">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <!--                                            <th>Доход</th>-->
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="silver">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <!--                                            <th>Доход</th>-->
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="tab-pane" id="gold">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <!--                                            <th>Доход</th>-->
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="platinum">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <!--                                            <th>Доход</th>-->
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="emerald">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="ruby">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="diamond">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="blue_diamond">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="black_diamond">
                        <div class="card" style="margin-top: -20px;">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-referals">
                                        <thead>
                                        <tr>
                                            <th>Логин</th>
                                            <th>Дата</th>
                                            <th>Уровень</th>
                                            <th>Общие инвестиции</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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



    <style type="text/css">
        .nav-tabs .black_diamond .active {
            color: #215e75c2 !important;
        }
        .nav-tabs .blue_diamond .active {
            color: #3b96d6 !important;
        }
        .nav-tabs .ruby .active {
            color: red !important;
        }

        .nav-tabs .emerald .active {
            color: #50c878 !important;
        }
        .nav-tabs .platinum .active {
            color: #828282 !important;
        }
        .nav-tabs .gold .active {
            color: #ffd700 !important;
        }
        .nav-tabs .silver .active {
            color: #c0c0c0 !important;
        }
        .nav-tabs .start .active {
            color: #000 !important;
        }

        .nav-tabs .nav-item .active i {
            text-shadow: 0px 0px 14px;
        }

        .nav-tabs .nav-item i{
            width: 25px;
        }
        .nav-tabs .active{
            border: none !important;
        }
        .nav-tabs .nav-item{
            text-align: center;
            border: none !important;
        }
        .nav-tabs .nav-item .nav-link{
            border: none !important;
        }

        .table i{
            font-size: 12px !important;
            width: 15px !important;
        }
        .conditions p{
            font-size: 15px;
        }
        .conditions i, .table i{
            width: 20px;
            font-size: 15px;
            text-align: center;
            margin-right: 5px;
        }
        .conditions .fa-times, .table .fa-times{
            color: #ec7e7e;
        }
        .fa-check, .fa-check-double {
            color: #66c166;
        }
    </style>



    <script type="text/javascript">
        $('.js-referals').DataTable({
            dom: 'Bfrtip'
        });
    </script>
@endsection
