@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Продукт</th>
                        <th>Доли</th>
                        <th>На сумму</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @if ($parts = \App\Models\Part::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('product_id', $product->id))
                            <tr>
                                <td><a href="{{ route('products.show', $product->id) }}" target="_blank">{{ $product->name }}</a></td>
                                <td>{{ $parts->sum('quantity') }}</td>
                                <td>{{ $parts->sum('quantity') * round($product->need_funds / $product->shares) }} руб.</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
