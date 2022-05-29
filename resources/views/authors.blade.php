

<div class="container mt-3" style="border-top: 2px solid black">
@if(count($authors))
    @foreach ($authors as $author)
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 offset-1">
                                    <h2 class="">{{$author->name}}</h2>
                                </div>
                                <div class="col-3 offset-1">
                                    <form action="/author/{{$author->id}}" method="post">
                                        @csrf
                                        <button class="btn btn-dark btn-md ">
                                            Просмотреть книги автора
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-3 offset-4">
        <h2 style="" class="text-danger mt-5">Авторы не найдены</h2>
    </div>

@endif
</div>
