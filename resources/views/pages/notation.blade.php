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
                    <option value="1">Клиент 1</option>
                    <option value="2">Клиент 2</option>
                    <option value="3">Клиент 3</option>
                    <option value="4">Клиент 4</option>
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
                    <option value="20">20р</option>
                    <option value="25">25р</option>
                    <option value="30">30р</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

    </div>
@endsection
</body>

