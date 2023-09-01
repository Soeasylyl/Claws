@extends('layouts.basic')
<body>
@section('content')

    <section class="clients">
        <div class="main-container">
            @include('sidebar')
            <div class="clients__wrapper">
                <div class="clients__buttons">
                    <button class="main-btn" id="client__btn_add">Добавить клиента</button>
                    <input class="clients__search-bar" type="text" placeholder="Поиск клиента">
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
                        <tbody class="clients__container-search">
                        @include('partials.components.search-clients')
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <ul class="pagination__list">
                        <!-- Кнопка "Предыдущая" -->
                        <li class="pagination-previous">
                            <a href="{{ $clients->previousPageUrl() }}" class="main-btn">Предыдущая</a>
                        </li>

                        <!-- Номера страниц -->
                        @for ($i = 1; $i <= $clients->lastPage(); $i++)
                            <li class="pagination__item">
                                <a href="{{ $clients->url($i) }}"
                                   class="main-btn {{ $clients->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Кнопка "Следующая" -->
                        <li class="pagination__next">
                            <a href="{{ $clients->nextPageUrl() }}" class="main-btn">Следующая</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
</body>

