@extends('layouts.basic')
<body>
@section('content')
    <div class="wrapper">
        @include('sidebar')
        {{--   БУДЕТ МЕНЯТЬСЯ --}}

        <form action="" method="post" style="padding: 20px">
            @csrf
            <div class="form-group">
                <label for="client_id">Выберите клиента:</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">Выберите клиента</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="appointment_date">Дата записи:</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="appointment_time">Время записи:</label>
                <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Цена:</label>
                <select name="price" id="price" class="form-control">
                    <option value="" disabled selected>Выберите цену</option>
                    @foreach($prices as $price)
                        <option value="{{ $price->id }}">{{ $price->price }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn_all">Добавить</button>
        </form>

    </div>
@endsection
</body>

