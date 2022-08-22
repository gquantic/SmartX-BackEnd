@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('files.update', $id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="body">
                            <div class="form-group mt-3">
                                <label for="">Файл</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <input type="submit" value="Изменить" class="btn btn-primary mt-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
