@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($descriptionId as $id)
        <div class="row">
            <div class="col-3 ">
                <img src="{{asset('images/'.$id->image . '.jpg')}}" alt="" class="img" style="width: 500px; height: 600px; border-radius: 50px">
            </div>
            <div class="col-5 offset-2">
                <h1 class="text">{{$id->name}}</h1>
                <h2 class="text">Автор:</h2>
                @if($id->status == false)
                    <form action="/books/add/{{$id->id}}" method="post" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-lg  btn-outline-secondary">Добавить в личный кабинет</button>
                    </form>
                @else
                    <form action="/books/delete/{{$id->id}}" method="post" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить из личного кабинета </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row offset-5" style="margin-top: 40px">
            <h1>Описание Книги</h1>
        </div>
        <div class="row">
            <p class="lead"> {{$id->content}}</p>
        </div>

    @endforeach
</div>
@endsection
