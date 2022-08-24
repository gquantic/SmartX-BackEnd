@extends('layouts.admin')

@section('page-title')
    Создать продукт
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('products-admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            Информация о продукте
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Изображение продукта</label> <br>
                                        <input type="file" id="image" class="dropify" name="img">
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Название</label> <br>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Описание</label> <br>
                                        <textarea type="text" class="form-control" rows="2" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Полное описание</label> <br>
                                        <textarea type="text" class="form-control" rows="4" name="full_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="mb-1">Конец сбора</label> <br>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------------->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            Финансы
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Необходимая сумма</label> <br>
                                        <input type="text" class="form-control" id="need_amount" name="need_funds" oninput="changeAmount()">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Долей</label> <br>
                                        <input type="text" class="form-control" id="shares" name="shares" oninput="changeAmount()">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    Итого: <b id="total">0</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------------->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            Вознаграждения
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Рыночная премия</label> <br>
                                        <input type="text" class="form-control" name="award" oninput="changeAmount()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Создать</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function changeAmount() {
        let need = $('#need_amount').val(),
            shares = $('#shares').val();

        $('#total').html(Math.floor(need / shares));
    }
</script>
