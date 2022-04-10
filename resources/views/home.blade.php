@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="row d-flex-nowrap">
        <div class="col-2" >
            <div class="sticky-top">
                @include('sidebar')
            </div>
        </div>
        <div class="col-10 ">
            <div class="row" style="margin-top: 30px">
                <h1>Книги</h1>
                @include('catalog_element')
            </div>
            <div class="row" style="margin-top: 30px">
                <h1>Авторы</h1>
                @include('authors')
            </div>
            <div class="row" style="margin-top: 30px">
                <h1>Категории</h1>
                @include('category')
            </div>
        </div>
    </div>
</div>


@endsection
