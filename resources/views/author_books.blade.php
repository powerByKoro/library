@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="">Книги автора: {{$name->name}}</h1>
    <div class="card-group">
        @foreach($author_books as $author)
            @foreach($author->books as $book)
                @if($book->status == false)
                   @include('book')
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@endsection
