@extends('layouts.app')

@section('content')
    @php
            use App\Models\Product;

            $parts = \App\Models\Part::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
            $investedQuantity = 0;
            $investedAmount = 0;

            foreach ($parts as $part) {
                $product = Product::where('id', $part->product_id)->first();
                $price = round(($product->need_funds / $product->shares) * $part->quantity);

                $investedQuantity += $part->quantity;
                $investedAmount += $price;
            }
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">
                        На вашем балансе:
                        <h4 class="mb-0 mt-2">{{ \Illuminate\Support\Facades\Auth::user()->balance }} руб.</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">
                        Реферальный баланс:
                        <h4 class="mb-0 mt-2">{{ \Illuminate\Support\Facades\Auth::user()->referral_balance }} руб.</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="body">
                        Инвестировано:
                        <h4 class="mb-0 mt-2">{{ $investedAmount }} руб.</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <b>Перевести пользователю</b>
                        <form method="post" action="{{ route('finances-send') }}">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="">ID пользователя</label>
                                <input type="text" name="to" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Сумма</label>
                                <input type="number" name="amount" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-primary mt-3">
                        </form>
                    </div>
                </div>
            </div>
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
        @if(\Session::has('success'))
            <div class="row mb-1">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
