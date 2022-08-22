@extends('layouts.admin')

@section('content')
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
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Проект</th>
                            <th>Имя</th>
                            <th>Путь к файлу</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php $num = 0; @endphp
                        @foreach($files as $file)
                            @php $num += 1; @endphp

                            <tr>
                                <td>{{ $num }}</td>
                                <td>{{ $file['id'] }}</td>
                                <td>{{ $file['product_id'] }}</td>
                                <td>{{ $file['name'] }}</td>
                                <td><a target="_blank" href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></td>
                                <td><a  href="{{ route('files.edit', $file['id']) }}"><button class="btn btn-primary">Изменить</button></a></td>
                              <td>
                                  <form action="{{ route('files.destroy', $file['id']) }}" method="post">
                                      @csrf
                                      @method('delete')

                                      <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить файл?')" class="btn btn-primary">Удалить</button>
                                  </form>
                              </td>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
