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
                        <form method="post" action="{{ route('add-deposit') }}">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="">Доходы</label>
                                <input type="income" name="amount" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Расходы</label>
                                <input type="expenses" name="amount" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Прибыль</label>
                                <input type="profit" name="amount" class="form-control">
                            </div>

                            <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                        </form>   
                    </div>
                </div>
            </div>

            
        </div>
 
    </div>
@endsection
