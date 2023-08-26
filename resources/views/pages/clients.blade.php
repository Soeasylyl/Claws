@extends('layouts.basic')
<body>
@section('content')
    <div class="wrapper">
        @include('sidebar')
        <div class="wrapper-clients">
            <div class="button-panel">
                <button class="btn-primary">Найти</button>
                <button class="btn-primary">Добавить</button>
                <button class="btn-primary">Редактировать</button>
            </div>
            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ФИО</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Как связаться</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($clients as $key => $client)
                        <tr>
                            <td> {{ $client->name }}</td>
                            <td> {{ $client->description }}</td>
                            <td> {{ $client->contacts }}</td>
                            <td>
                                <div class="trash__icon_container">
                                    <a href="{{ route('clients.delete', ['id' => $client->id]) }}"
                                       onclick="event.preventDefault(); if (confirm('Вы уверены?')) document.getElementById('delete-form-{{ $client->id }}').submit();">
                                        <div class="trash__icon">
                                            <div class="trash__icon">
                                                {!! file_get_contents(public_path('/images/svg/trash-can.svg')) !!}
                                            </div>
                                    </a>
                                    <form id="delete-form-{{ $client->id }}" action="{{ route('clients.delete', ['id' => $client->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>

