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
                    @foreach($transaction as $item)
                        @php
                            if($item['type'] == 'input') $type = 'Ввод';
                            else $type = 'Вывод';
                            $num += 1;
                        @endphp

                        <tr>
                            <td>{{ $num }}</td>
                            <td>{{ $type }}</td>
                            <td>{{ $item['amount'] }}</td>
                            <td>{{ $item['communication_method'] }}</td>
                            <td>{{ $item['communication_contact'] }}</td>
                            {{-- <td>{{ $item['status'] }}</td> --}}
                            <td>
                                <form id="update" action="{{ route('finances-admin.update', $item['id']) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <select class="w-100" name="edit_status" aria-label="Default select example">
                                        <option selected value="{{ $item['status'] }}">{{ $item['status'] }}</option>
                                        <option value="Ожидание">Ожидание</option>
                                        <option value="Ответьте менеджеру">Ответьте менеджеру</option>
                                        <option value="Принят">Принят</option>
                                        <option value="Отклонён">Отклонён</option>
                                      </select>
                                </form>

                            </td>
                            <td>{{ $item['created_at'] }}</td>
                            <td><button class="btn btn-primary" type="submit" form="update">Сохранить</button></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
