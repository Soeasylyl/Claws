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
                    <tr>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                    </tr>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    </tr>
                    <tr>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                    </tr>
                    <tr>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                    </tr>
                    <tr>
                        <td>text</td>
                        <td>random</td>
                        <td>layout</td>
                    </tr>
                    <tr>
                        <td>dashboard</td>
                        <td>irrelevant</td>
                        <td>text</td>
                    </tr>
                    <tr>
                        <td>dashboard</td>
                        <td>illustrative</td>
                        <td>rich</td>
                    </tr>
                    <tr>
                        <td>placeholder</td>
                        <td>tabular</td>
                        <td>information</td>
                    </tr>
                    <tr>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                    </tr>
                    <tr>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                    </tr>
                    <tr>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>

