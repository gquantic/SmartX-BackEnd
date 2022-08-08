@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="body">
                            <div class="form-group">
                                <label for="">Проект</label>
                                <select name="product_id" id="" class="form-control form-select">
                                    @foreach(\App\Models\Product::all() as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Название</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Файл</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <input type="submit" value="Загрузить" class="btn btn-primary mt-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
