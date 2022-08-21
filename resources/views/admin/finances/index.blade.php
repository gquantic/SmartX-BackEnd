@extends('layouts.admin')

@section('page-title')
    Пользователи
@endsection

@section('content')
    <div class="container-fluid">
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
                        </tr>
                    </thead>
                    <tbody>

                    @php $num = 0; @endphp
                    @foreach($transactions as $transaction)
                        @php
                            if($transaction['type'] == 'input') $type = 'Ввод';
                            else $type = 'Вывод';
                            $num += 1;
                        @endphp

                        <tr>
                            <td>{{ $num }}</td>
                            <td>{{ $type }}</td>
                            <td>{{ $transaction['amount'] }}</td>
                            <td>{{ $transaction['communication_method'] }}</td>
                            <td>{{ $transaction['communication_contact'] }}</td>
                            <td>{{ $transaction['status'] }}</td>
                            <td>{{ $transaction['created_at'] }}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
