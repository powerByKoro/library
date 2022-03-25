@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-4">
            ВЫ ПОПАЛИ НА НАЧАЛЬНУЮ СТРАНИЦУ БИБЛИОТЕКИ
        </div>
        <div class="" style="margin-top: 100px">
            @include('catalog_element')
        </div>
    </div>

@endsection
