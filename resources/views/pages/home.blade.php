@extends('layouts.basic')
<body>
@section('content')

    <div class="wrapper">
        @include('sidebar')
        <div class="table-responsive small" style="padding: 10px">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ФИО</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Время</th>
                    <th scope="col">Сколько осталось</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sortedRecords as $record)
                    <tr>
                        <td>{{ $record->client->name }}</td>
                        <td>{{ $record->date }}</td>
                        <td>{{ $record->time }}</td>
                        <td>{{ $record->timeRemaining }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
</body>
