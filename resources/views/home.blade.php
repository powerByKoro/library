@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <ul class="nav  justify-content-evenly" style="border-bottom: 3px solid black">
        <li class="nav-item ">
            <div class="row align-items-center">
                <form method="GET" action="/search">
                    <div class="input-group">
                        <div class="form-outline" style="margin-top: 7px">
                            <input type="text" id="search" class="form-control" style="height: 50px;width: 350px " name="search" placeholder="Поиск по названию"/>
                        </div>
                        <button id="search-button" type="submit" class="btn btn-info  " style="color: white; margin-top: 7px; width: 60px"  >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <figcaption class="blockquote-footer">
                    Поиск литературы по названию
                </figcaption>
            </div>
        </li>
    </ul>
    <div class="row d-flex-nowrap">
        <div class="col-1" >
            <div class="sticky-top">
                @include('sidebar')
            </div>
        </div>
        <div class="col-11 ">
            <div class="row" style="margin-top: 30px">
                <div class="col-4 ">
                    <h1>УДК</h1>
                    @include('category')
                </div>
                <div class="col-5 offset-2">
                    <div class="row">
                        <div class="col-2">
                            <h1>Авторы</h1>
                        </div>
                        <div class="col-7 offset-2">
                            <a href="/authors_page" class="nav-link"><h3 class="">Перейти к каталогу авторов</h3></a>
                        </div>
                    </div>
                    @php
                        $authors_sidebar = $authors[0];
                    @endphp
                    @include('authors_sidebar')
                </div>
             </div>
            <div class="row offset-4" style="margin-top: 30px; border-radius: 10px">
                @if($errors->any())
                    <h3 class="text-danger" >{{$errors->first()}} </h3>
                    <h6>- Получите читательский билет в личном кабинете.</h6>
                @endif
            </div>
            <div class="row" style="margin-top: 30px">
                <h1>Книги</h1>
                @include('catalog_element')
            </div>
    </div>
</div>


@endsection
