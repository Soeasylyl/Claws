@extends('layouts.basic')
<body>
@section('content')

    <section class="clients">
        <div class="main-container">
            @include('sidebar')
            <div class="clients__wrapper">
                <div class="clients__buttons">
                    <button class="main-btn">Найти</button>
                    <button class="main-btn" id="client__btn_add">Добавить клиента</button>
                </div>
                <div class="clients__table small">
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
                                    <div class="clients__icon-wrapper">
                                        <div class="clients__edit-btn" data-id =" {{ $client->id }}" data-name="{{ $client->name }}" data-description="{{ $client->description }}" data-contacts="{{ $client->contacts }}">
                                            {!! file_get_contents(public_path('/images/svg/edit2.svg')) !!}
                                        </div>
                                        <div class="clients__trash-container">
                                            <a href="{{ route('clients.delete', ['id' => $client->id]) }}"
                                               data-id="{{ $client->id }}">
                                                <div class="clients__trash-icon">
                                                    {!! file_get_contents(public_path('/images/svg/trash-can.svg')) !!}
                                                </div>
                                            </a>
                                            <form id="delete-form-{{ $client->id }}"
                                                  action="{{ route('clients.delete', ['id' => $client->id]) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
</body>

