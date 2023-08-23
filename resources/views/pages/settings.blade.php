@extends('layouts.basic')
<body>
@section('content')
    <div class="wrapper">
    @include('sidebar')


        <form action="" method="post" style="padding: 20px">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="work_price">Общая цена за работу:</label>
                <input type="number" name="work_price" id="work_price" class="form-control" value="" required>
            </div>

            <div class="form-group">
                <label for="material_price">Цена расходников:</label>
                <input type="number" name="material_price" id="material_price" class="form-control" value="" required>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
{{--   БУДЕТ МЕНЯТЬСЯ --}}
@endsection
</body>

