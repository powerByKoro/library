@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 offset-3">
                <h2 class="">
                    Вход для администратора
                </h2>
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Логин</label>
                        <input type="email" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Введите Ваш логин">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md mt-2" style="width: 100px">Вход</button>
                </form>
            </div>
        </div>
    </div>
@endsection
