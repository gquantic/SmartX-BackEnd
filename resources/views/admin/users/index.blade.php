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
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Баланс</th>
                            <th>Реферальный баланс</th>
                            <th>ID</th>
                            <th>Реферал</th>
                            <th>Приобретено долей</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->balance }}</td>
                            <td>{{ $user->referral_balance }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->referral }}</td>
                            <td>{{ $user->parts() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
