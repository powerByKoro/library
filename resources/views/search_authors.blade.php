@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <form method="GET" action="/search_authors">
                    <div class="input-group">
                        <div class="form-outline" style="margin-top: 7px">
                            <input type="text" id="search" class="form-control" style="height: 50px;width: 300px " name="search" placeholder="Поиск по авторам"/>
                        </div>
                        <button id="search-button" type="submit" class="btn btn-info  " style="color: white; margin-top: 7px; width: 60px"  >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
        @include('authors')

@endsection
