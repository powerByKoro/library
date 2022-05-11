@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Личный кабинет</h2>
    <div class="row">
        <div class="col-3">
            <img src="{{asset('/storage/'. Auth::user()->img)}}" alt="" class="img-fluid" style="height: 350px;width: 290px;border-radius: 15px">
            <form action="/image/upload/{{Auth::user()->id}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-control" style="border: none">
                    <input type="file" required name="image" id="image">
                    <button class="btn btn-dark" type="submit" style="margin-top: 10px">Изменить фотографию профиля </button>
                </div>
            </form>
        </div>
        <div class="col-9">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3">
                            ФИО
                        </div>
                        <div class="col-5 offset-1">
                            {{Auth::user()->name}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3">
                            Дата регистрации
                        </div>
                        <div class="col-5 offset-1">
                            {{Auth::user()->created_at->format('d/m/Y')}}
                        </div>
                    </div>
                </li>
                @if((Auth::user()->bilet)!=null)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                               Номер читательского билета
                            </div>
                            <div class="col-5 offset-1">
                                MAI-2022-{{Auth::user()->bilet}}
                            </div>
                        </div>
                    </li>
                @else
                    <li class="list-group-item">
                        <form action="/get_bilet" class="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    Получить читательский билет
                                </div>
                                <div class="col-5 offset-1">
                                    <label for="pasport" class="form-label">Серия и номер паспорта</label>
                                    <input type="text" id="pasport" class="form-control" name="pasport">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Введите серию и номер паспорта без пробелов.
                                    </div>
                                    <button type="submit" class="">поехали</button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-3 offset-5">
        <h2> Зарезервированные книги</h2>
    </div>
    <div class="row d-flex-nowrap">
        <div class="col-10 offset-2">
            <div class="card-group "  style="margin-top: 20px">
                @foreach ($reservationBooks as $reservationBook)
                    <div class="card" style="max-width: 250px; min-width: 250px; margin: 10px; border-radius: 15px; background-color: #f5f5f5">
                        <img src="{{asset('images/'.$reservationBook->image . '.jpg')}}" class="card-img-top" style="width: 230px; height: 280px; margin: 10px;border-radius: 10px">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{$reservationBook->name}}</h5>
                            <div class="">
                                <h3 class="text">
                                    @if($reservationBook->date_return === null)
                                        ошибка
                                    @else
                                        Резерв до <br>
                                        {{Carbon\Carbon::parse($reservationBook->date_return)->format('Дата: d/m/Y  Время: H:i')}}
                                    @endif
                                </h3>
                            </div>

                            <div class="d-flex justify-content-center">
                                <form action="/books/delete/{{$reservationBook->id}}" method="post" class="form-inline ">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Удалить из резерва</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
