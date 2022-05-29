

<div class="container mt-3" style="border-top: 2px solid black">
@foreach ($authors as $author)
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h2 class="">{{$author->name}}</h2>
                        <form action="/author/{{$author->id}}" method="post">
                            @csrf
                            <button class="btn btn-dark btn-md mt-2">
                                Просмотреть книги автора
                            </button>
                        </form>
                    </div>
                    <div class="col-3">
                        <img src="{{asset('images/'.$author->image . '.jpg')}}" class="card-img-top" style="width: 250px; height: 250px; margin: 10px;border-radius: 10px">
                    </div>
                    <div class="col-3">
                      <p class="" style="
                        overflow: hidden;
                          display: -webkit-box;
                          -webkit-line-clamp: 9;
                          -webkit-box-orient: vertical;
                          line-height: 1.3em;
                          height: 11.9em;
                        ">
                          {{$author->content}}
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
