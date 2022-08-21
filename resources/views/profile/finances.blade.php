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
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <b>Пополнить счет</b>
                        <form method="post" action="{{ route('add-deposit') }}">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="">Сумма</label>
                                <input type="number" name="amount" class="form-control">
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col">
                                    <label for="">Сумма</label>
                                    <select class="w-100" name="communication_method" aria-label="Default select example">
                                        <option selected>Способ связи</option>
                                        <option value="Whatsapp">Whatsapp</option>
                                        <option value="Telegram">Telegram</option>
                                        <option value="Vk">Vk</option>
                                      </select>
                                </div>
                                <div class="col">
                                    <label for="">Сумма</label>
                                    <input type="text" name="communication_contact" class="form-control" placeholder="ссылка">
                                </div>
                              </div>
                            
                            
                            <input type="submit" class="btn btn-primary mt-3">
                        </form>

                        <div class="col-lg-12 col-md-12">
                            <div class="body">
                                <b>История транзакции</b>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Тип</th>
                                        <th scope="col">Сумма</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Дата</th>
                                      </tr>
                                    </thead>
                                    @foreach($transactions as $transaction)
                                    
                                        <tbody>
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $transaction->type }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>{{ $transaction->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                  </table>
                            </div>
                        </div>

                        
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
