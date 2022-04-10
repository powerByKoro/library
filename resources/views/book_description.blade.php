@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($descriptionId as $id)
        <div class="row">
            <div class="col-3 ">
                <img src="{{asset($id->image)}}" alt="" class="img" style="width: 700px; height: 500px">
            </div>
            <div class="col-4 offset-5">
                @if($id->status == false)
                    <form action="/books/add/{{$id->id}}" method="post" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Добавить в личный кабинет</button>
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
            <h1>Описание</h1>
        </div>
        <div class="row">
            {{$id->content}}
        </div>

    @endforeach
</div>
@endsection
