@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <h6>Ваша реферальная ссылка</h6>
                        <div class="d-flex justify-content-start align-items-center">
                            <input type="text" class="form-control bg-white text-black" style="border: 2px solid #46c7a8;margin-right: 15px;"
                                   value="{{ config('app.url') }}/register/{{ \Illuminate\Support\Facades\Auth::id() }}" id="ref_link" readonly>
                            <button class="btn ml-5" style="background: #46c7a8;color:#fff;" onclick="copyRef()">Скопировать</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6>Финансовый счёт</h6>
                                    <div class="position-absolute" style="right: 0;margin-right: 20px;">
                                        <a class="btn btn-warning fit-content">Пополнить</a>
                                        <a class="btn btn-warning fit-content ">Вывести</a>
                                    </div>
                                </div>
                                <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->balance }} руб.</h2>
                                <small>Общая сумма на Вашем счете</small>
                            </div>
{{--                            <div class="col-4 d-flex flex-column justify-content-start align-items-end">--}}
{{--                                <a class="btn btn-warning fit-content mb-1">Пополнить</a>--}}
{{--                                <a class="btn btn-warning fit-content ">Вывести</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6>Активные инвестиции</h6>
                                    <div class="position-absolute" style="right: 0;margin-right: 20px;">
                                        <a class="btn btn-warning fit-content mb-1">Инвестировать</a>
                                    </div>
                                </div>
                                <h2 class="amount">{{ $investedAmount }} руб.</h2>
                                <small>Актуальная сумма, которая инвестирована в проекты</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-8">
                                <h6>Заработано на Smart X-Investment</h6>
                                <h2 class="amount">0 руб.</h2>
                                <small>Общая сумма, полученная от инвестиций</small>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-start align-items-end">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-8">
                                <h6>Партнёрская программа</h6>
                                <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->referral_balance }} руб.</h2>
                                <small>Общая сумма средств, заработанных в партнерстве</small>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-start align-items-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-8">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6>Всего выведено</h6>
                                    <div class="position-absolute" style="right: 0;margin-right: 20px;">
                                    </div>
                                </div>
                                <h2 class="amount">0 руб.</h2>
                                <small>Общая сумма выведенных Вами средств</small>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-start align-items-end">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 traffic">
                    <div class="body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h6>Общая прибыль</h6>
                                    <div class="position-absolute" style="right: 0;margin-right: 20px;">
                                        <a class="btn btn-warning fit-content mb-1">Перевести на баланс</a>
                                        <a class="btn btn-warning fit-content mb-1">Вывести</a>
                                    </div>
                                </div>
                                <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->referral_balance }} руб.</h2>
                                <small>Доход с инвестиций и рефералов</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let elements = document.getElementsByClassName('amount');
        for (let item of elements) {
            let current = $(item);
            if (current.html() === '0 руб.') {
                current.css({'color': '#c90000'});
            } else {
                current.css({'color': '#46c7a8'});
            }
        }

        function copyRef() {
            let element = $('#ref_link');
            let value = element.val();

            // Копируем
            element.focus();
            element.select();
            document.execCommand('copy');

            // Показываем сообщение
            element.val('Ссылка скопирована!');

            setTimeout(function () {
                element.val(value);
            }, 1000);
        }
    </script>
@endsection

<style>
    .fit-content {
        width: fit-content !important;
        padding: 5px 10px !important;
    }
</style>
