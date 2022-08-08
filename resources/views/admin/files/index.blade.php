@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-light" href="{{ route('files.create') }}">Добавить файл</a>
            </div>
            <br><br>
            <div class="col-lg-12">
                @foreach($files as $file)
                    <div class="p-1">
                        <a target="_blank" href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
