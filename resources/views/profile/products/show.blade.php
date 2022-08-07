@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            @if($errors->any())
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif
                @if(\Session::has('success'))
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        </div>
                    </div>
                @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-12">
                                <div class="preview preview-pic tab-content">
                                    <div class="tab-pane active" id="product_1"><img src="{{ asset('/storage/' . $product->image) }}" class="img-fluid" alt=""></div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-12">
                                <div class="product details">
                                    <h3 class="product-title mb-0">{{ $product->name }}</h3>
                                    <p>{{ $product->description }}</p>
                                    <p style="font-size: 17px;" class="price mt-0">Необходимая сумма:
                                        <span class="col-amber" style="color:#ff6100 !important;">
                                            {{ $product->need_funds }}₽
                                        </span>
                                    </p>
                                    <h5 style="font-size: 17px;margin-top: -15px;" class="price">
                                        Рыночная премия:
                                        <span class="col-amber" style="color:#ff6100 !important;">
                                            {{ $product->award }}%
                                        </span>
                                    </h5>
                                    <hr>
                                    <p class="product-description">{{ $product->full_description }}</p>
                                    <div class="action">
                                        <a @if($product->shares - $product->parts()->sum('quantity') > 0) href='{{ route('invest', $product->id) }}' @endif>
                                            <button class="btn btn-success waves-effect" type="button"
                                                    @if ($product->shares - $product->parts()->sum('quantity') <= 0) disabled @endif>
                                                Инвестировать
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">Финансы</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#conditions">Условия</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#team">Команда</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#files">Дополнительные файлы</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">
                                <p>Сумма к размещению: {{ $product->need_funds }}₽</p>
                                <p>Количество долей: {{ $product->shares }}</p>
                                <p>Осталось долей: {{ $product->shares - $product->parts()->sum('quantity') }}</p>
                                <p>Стоимость доли: {{ round($product->need_funds / $product->shares) }} ₽</p>
                                <p>Уже собрано: {{ (round($product->need_funds / $product->shares)) * $product->parts()->sum('quantity') }} ₽</p>
                                <p>Осталось дней: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $product->end_date)->diffInDays() }}</p>
                            </div>
                            <div class="tab-pane" id="conditions">
                                Рыночная премия {{ $product->award }}%
                            </div>
                            <div class="tab-pane" id="team">
                                <h6 class="text-center mb-0">Участники команды не указаны</h6>
                            </div>
                            <div class="tab-pane" id="files">
                                <h6 class="text-center mb-0">Нет дополнительных файлов</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
