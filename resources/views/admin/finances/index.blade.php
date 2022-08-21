@extends('layouts.admin')

@section('page-title')
    Пользователи
@endsection

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
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Тип</th>
                            <th>Сумма</th>
                            <th>Способ связи</th>
                            <th>Контакт</th>
                            <th>Статус</th>
                            <th>Дата</th>
                            <th>Изменить</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php $num = 0; @endphp
                    @foreach($transactions as $transaction)
                        @php
                            if($transaction['type'] == 'input') $type = 'Ввод';
                            else $type = 'Вывод';
                            $num += 1;
                            $id = $transaction['id'];
                        @endphp

                        <tr>
                            <td>{{ $num }}</td>
                            <td>{{ $type }}</td>
                            <td>{{ $transaction['amount'] }}</td>
                            <td>{{ $transaction['communication_method'] }}</td>
                            <td>{{ $transaction['communication_contact'] }}</td>
                            <td>{{ $transaction['status'] }}</td>
                            <td>{{ $transaction['created_at'] }}</td>
                            <td><a href="{{ route('finances.edit', $id) }}"><button class="btn btn-primary">Изменить</button></a></td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
