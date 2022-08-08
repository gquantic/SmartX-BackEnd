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
                        <h6>Финансовый счёт</h6>
                        <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->balance }} руб.</h2>
                        <small>Общая сумма на Вашем счете</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Активные инвестиции</h6>
{{--                        <h2 class="amount">{{ $investedQuantity }} долей на {{ $investedAmount }} руб.</h2>--}}
                        <h2 class="amount">{{ $investedAmount }} руб.</h2>
                        <small>Актуальная сумма, которая инвестирована в проекты</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Заработано на Smart X-Investment</h6>
                        <h2 class="amount">0 руб.</h2>
                        <small>Общая сумма, полученная от инвестиций</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Партнёрская программа</h6>
                        <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->referral_balance }} руб.</h2>
                        <small>Общая сумма средств, заработанных в партнерстве Smart X-Invesment</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">
                        <h6>Всего выведено</h6>
                        <h2 class="amount">0 руб.</h2>
                        <small>Общая сумма выведенных Вами средств</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card widget_2 sales">
                    <div class="body">

                        <div class="d-flex justify-content-between">
                            <h6>Общая прибыль</h6>
                            <div class="d-flex">
                                <div class="mr-3" style="margin-right: 10px;">
                                    <a href="{{ route('finances') }}" class="">Перевести на финансовый счёт</a>
                                </div>
                                <div class="ml-1">
                                    <a href="{{ route('finances') }}" class="ml-1">Вывести</a>
                                </div>
                            </div>
                        </div>
                        <h2 class="amount">{{ \Illuminate\Support\Facades\Auth::user()->referral_balance }} руб.</h2>
                        <small>Доход в совокупности, полученный от инвестиций и с партнёрской программы за весь период</small>
                        <br>
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
