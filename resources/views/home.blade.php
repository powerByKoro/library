@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <ul class="nav  justify-content-evenly" style="border-bottom: 3px solid black">
        <li class="nav-item " style="">
            <a class="nav-link  h1  "  aria-current="page" href="/authors_page">
                Авторы
            </a>
            <figcaption class="blockquote-footer">
                Поиск литературы по Авторам
            </figcaption>
        </li>
        <li class="nav-item ">
            <a class="nav-link  h1 " href="/category_page">Категории книг</a>
            <figcaption class="blockquote-footer">
                Поиск литературы по Категориям
            </figcaption>
        </li>
    </ul>
    <div class="row d-flex-nowrap">
        <div class="col-2" >
            <div class="sticky-top">
                @include('sidebar')
            </div>
        </div>
        <div class="col-10 ">
            <div class="row" style="margin-top: 30px">
                <h1>Категории</h1>
                @include('category')
             </div>
            <div class="row" style="margin-top: 30px">
                <h1>Книги</h1>
                @php
                    $second_books=$books[1];
                    $third_books=$books[2];
                    $books = $books[0];
                @endphp
                @include('catalog_element')
            </div>
            <div class="row" style="margin-top: 30px">
                <h1>Авторы</h1>
                @php
                    $authors = $authors[0];
                @endphp
                @include('authors')
            </div>
            <div class="row" style="margin-top: 30px">
                <h1>Книги</h1>
                @php
                    $books = $second_books;
                @endphp
                @include('catalog_element')
            </div>
    </div>
</div>


@endsection
