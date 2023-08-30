@extends('layouts.basic')
<body>
@section('content')
{{--    <div class="wrapper">--}}
{{--        @include('sidebar')--}}
{{--        <div class="wrapper-clients">--}}
{{--            <div class="button-panel">--}}
{{--                <button class="btn_all">Найти</button>--}}
{{--                <button class="btn_all" id="btn__add">Добавить клиента</button>--}}
{{--            </div>--}}
{{--            <div class="table-responsive small">--}}
{{--                <table class="table table-striped table-sm">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">ФИО</th>--}}
{{--                        <th scope="col">Описание</th>--}}
{{--                        <th scope="col">Как связаться</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}

{{--                    @foreach($clients as $key => $client)--}}
{{--                        <tr>--}}
{{--                            <td> {{ $client->name }}</td>--}}
{{--                            <td> {{ $client->description }}</td>--}}
{{--                            <td> {{ $client->contacts }}</td>--}}
{{--                            <td>--}}
{{--                                <div class="icon_wrapper">--}}
{{--                                    <div class="edit__icon_container">--}}
{{--                                        <div class="edit_icon">--}}
{{--                                            {!! file_get_contents(public_path('/images/svg/edit2.svg')) !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="trash__icon_container">--}}
{{--                                        <a href="{{ route('clients.delete', ['id' => $client->id]) }}"--}}
{{--                                           data-id="{{ $client->id }}">--}}
{{--                                            <div class="trash__icon">--}}
{{--                                                {!! file_get_contents(public_path('/images/svg/trash-can.svg')) !!}--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                        <form id="delete-form-{{ $client->id }}"--}}
{{--                                              action="{{ route('clients.delete', ['id' => $client->id]) }}"--}}
{{--                                              method="POST" style="display: none;">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="clients">
        <div class="main-container">
            @include('sidebar')
            <div class="clients__wrapper">
                <div class="clients__buttons">
                    <button class="btn">Найти</button>
                    <button class="btn" id="btn__add">Добавить клиента</button>
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
                                        <div class="clients__edit-btn">
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

