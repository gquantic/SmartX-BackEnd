@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Продукт</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th>Дата инвестиции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parts as $part)
                        <tr>
                            <td>{{ $part->product->name }}</td>
                            <td>{{ $part->quantity }}</td>
                            <td>{{ round($part->product->need_funds / $part->product->shares) * $part->quantity }}</td>
                            <td>{{ $part->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
