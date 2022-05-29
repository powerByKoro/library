@extends('layouts.app')
@section('content')
    <div class="container">
    @if($reservationBooks)
            @foreach($reservationBooks as $book)
                <div class="row" style="border-bottom: 3px solid black">
                    <div class="col-3 mt-2">
                        <h2>{{$book->name}}</h2>
                    </div>
                    <div class="col-3">
                        <h2>Дата брони: {{$book->created_at}}</h2>
                    </div>
                    <div class="col-3" >
                        <h2>Дата возврата: {{$book->date_return}}</h2>
                    </div>
                    <div class="col-3">
                        <form method="POST" action="/admin_dashboard_delete_book/{{$book->id}}" class="">
                            @csrf
                            <button class="btn-md btn-danger">Удалить резерв</button>
                        </form>
                    </div>
                </div>
            @endforeach
    @else
        <h2>Резервов не найдено</h2>
    @endif
    </div>
@endsection
