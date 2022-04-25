@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="col-10 offset-2">
        <h1 class=""> {{$name->name}}</h1>
        <div class="row">
            <div class="card-group">
                @foreach($category_books as $category)
                    @foreach($category->books as $book)
                        @if($book->status == false)
                            @include('book')
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
