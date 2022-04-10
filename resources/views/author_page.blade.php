@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="">Страница Автора {{$name->name}}</h1>
        <div class="card-group">
            @foreach($authors as $author)
                @foreach($author->books as $book)
                    @if($book->status == false)
                        <div class="card" style="max-width: 250px;">
                            <img src="{{asset($book->image)}}" class="card-img-top" style="width: 100%; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{$book->name}}</h5>
                                <p class="card-text">{{$book->content}}</p>
                                <form action="/books/add/{{$book->id}}" method="post" class="form-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Добавить в личный кабинет</button>
                                </form>
                                <form action="/book_description/{{$book->id}}" method="post" class="form-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        Описание книги
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
