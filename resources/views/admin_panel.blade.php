@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="">Проверка наличия читательского билета</h2>
            <div class="col-4">
                <form method="POST" action="/admin_dashboard_check_user">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО посетителя</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Номер Паспорта</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="pasport" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Проверить</button>
                </form>
            </div>
            <div class="col-5 offset-2" style="">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div><h2>{{ $error }}</h2></div>
                    @endforeach
                @endif

            </div>
        </div>

        <div class="row" style="margin-top: 50px">
            <h2 class="">Проверка зарезервированных книг</h2>
            <div class="col-4">
                <form method="POST" action="/admin_dashboard_check_reservation">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Номер Читательского билета</label>
                        <input type="number" class="form-control" name="bilet" id="exampleInputPassword1" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Проверить</button>
                </form>
            </div>

        </div>
    </div>
@endsection
