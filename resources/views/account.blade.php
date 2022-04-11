@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Личный кабинет</h2>
    <div class="row">
        <div class="col-3">
            <img src="{{asset('/storage/'. Auth::user()->img)}}" alt="" class="img-fluid" style="height: 200px;width: 300px">
            <form action="{{route('upload_img')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-control">
                    <input type="file" required name="image" id="image">
                    <button class="btn btn-dark" type="submit">загрузить свою картинку </button>
                </div>

            </form>
        </div>
        <div class="col-9">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            ФИО
                        </div>
                        <div class="col-3 offset-1">
                            {{Auth::user()->name}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-3 offset-5">
            <h2>Мои книги</h2>
        </div>
    </div>
    <div class="card-group "  style="margin-top: 20px">
        @foreach ($reservationBooks as $reservationBook)
            <div class="card" style="max-width: 250px">
                <img src="{{asset('images/'.$reservationBook->image . '.jpg')}}" class="card-img-top" style="width: 100%; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title text-truncate">{{$reservationBook->name}}</h5>
                    <p class="card-text text-truncate">{{$reservationBook->content}}</p>
                    <form action="/books/delete/{{$reservationBook->id}}" method="post" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить из личного кабинета</button>
                    </form>
                    <div class="d-flex justify-content-center">
                        <form action="/book_description/{{$reservationBook->id}}" method="post" class="form-inline ">
                            @csrf
                            <button type="submit" class="btn btn-secondary" style="margin-top: 10px">
                                Описание книги
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row" style="margin-top: 100px">
        <div class="col-3 offset-5">
            <h2>Мои Авторы</h2>
        </div>
    </div>
</div>
@endsection
