@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body product_item" style="/*min-height: 326px;*/">
                            <!--span class="label onsale">Популярный</span-->
                            <div class="text-center" style="height:250px;display:flex;align-items: top;text-align: center;justify-content: center;">
                                <div style="height:100%;width:100%;background-size:auto;background-position: center center;display: flex;justify-content: center;align-items: center;">
                                    <img src="{{ asset('/storage/' . $product->image) }}" style="max-width: 100%; max-height:100%;" alt="">
                                </div>
                            </div>
                            <div class="product_details">
                                <a href="{!! route('products.show', $product->id) !!}">{{ $product->name }}</a>
                                <ul class="product_price list-unstyled">
                                    <li class="old_price" style="color:#ee2558;">{{ $product->end_date }} дней</li>
                                    <li class="new_price" style="font-size:16px;">{{ $product->award }}%</li>
                                </ul>
                            </div>
                            <div class="action">
                                <a href="{!! route('products.show', $product->id) !!}" class="btn btn-primary waves-effect">Подробнее</a>
                                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                                    <a href="{!! route('products-admin.edit', $product->id) !!}" class="btn btn-primary waves-effect">Редактировать</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <a href="{{ route('products.create') }}">
                            <div class="card">
                                <div class="body product_item text-center" style="/*min-height: 326px;*/">
                                    <!--span class="label onsale">Популярный</span-->
                                    <div class="text-center" style="height:250px;display:flex;align-items: top;text-align: center;justify-content: center;">
                                        <div style="height:100%;width:100%;background-size:auto;background-position: center center;display: flex;justify-content: center;align-items: center;">
                                            <h2 class="mb-0 mt-0" style="user-select: none;">Новый продукт</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
        </div>
    </div>
@endsection
