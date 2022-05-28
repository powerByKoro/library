@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="">Проверка наличия читательского билета</h2>
            <div class="col-4">
                <form method="POST" action="/admin_panel_check_user">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО посетителя</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Номер Паспорта</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="pasport" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Проверить</button>
                </form>
            </div>
        </div>

        <div class="col-4 ">
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
        </div>

        <div class="row" style="margin-top: 50px">
            <h2 class="">Проверка зарезервированных книг</h2>
            <div class="col-4">
                <form method="POST" action="/admin_panel_check_reservation">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Номер Читательского билета</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Проверить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
