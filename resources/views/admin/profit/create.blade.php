@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="row mt-2">
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

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body">
                    <b>Добавить прибыль</b>
                    <form action="{{ route('profit-store') }}" method="post" >
                        @csrf
                        <input type="hidden" name ="product_id" value="{{ $product_id }}">
                        <div class="form-group mt-2">
                            <label for="">Доходы</label>
                            <input type="number" name="income" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Расходы</label>
                            <input type="number" name="cost" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Прибыль</label>
                            <input type="number" name="profit" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                    </form>
                </div>
            </div>
        </div>


    </div>

    </div>
@endsection
