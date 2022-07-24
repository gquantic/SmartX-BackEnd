@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Информация</strong> о продукте</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-6">
                                <h6>Количество долей</h6>
                                <p>{{ round($product->need_funds) }}</p>

                                <h6>Стоимость доли</h6>
                                <p>{{ round($product->need_funds / $product->shares) }}₽</p>
                            </div>

                            <div class="col-6">
                                <h6>Осталость долей</h6>
                                <p>{{ $product->shares - $product->parts()->sum('quantity') }}</p>

                                <h6>Дата окончания</h6>
                                <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $product->end_date)->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Инвестировать</strong> в продукт</h2>
                    </div>
                    <div class="body pb-2">
                        <form class="row" method="post" action="{{ route('make-invest', $product->id) }}">
                            @csrf
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="number" min="1" max="{{ intval($product->shares) }}" class="form-control mb-3"
                                           name="quantity" placeholder="Количество долей" oninput="updateAmount(this)" value="{{ old('quantity') }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" name="address" placeholder="Адрес проживания" value="{{ old('address') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" name="comment" placeholder="Комментарий (Необязательно)">{{ old('comment') }}</textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex align-items-center">
                                    <p class="mb-0" id="finalPrice">Итоговая сумма: 0</p>
                                </div>

                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <button class="btn btn-primary" type="submit" id="invest" disabled>Инвестировать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if($errors->any())
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    var price = {{ $product->need_funds / $product->shares }};
    var maxShares = {{ $product->shares - $product->parts()->sum('quantity') }};

    function updateAmount(element) {
        if (element.value > maxShares) {
            document.getElementById('invest').setAttribute('disabled', true);
            return document.getElementById('finalPrice').innerHTML = 'Максимум ' + maxShares + ' долей!';
        }

        if (element.value < 1) {
            document.getElementById('invest').setAttribute('disabled', true);
            return document.getElementById('finalPrice').innerHTML = 'Минимальное количество, доступное для покупки: 1!';
        }

        var amount = element.value;
        document.getElementById('finalPrice').innerHTML = 'Итоговая сумма: ' + Math.floor(amount * price) + '₽';
        document.getElementById('invest').removeAttribute('disabled');
    }
</script>
