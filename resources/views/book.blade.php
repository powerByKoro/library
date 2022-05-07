<div class="card" style="max-width: 250px; min-width: 250px; margin: 10px; border-radius: 15px; background-color: #f5f5f5">
    <img src="{{asset('images/'.$book->image . '.jpg')}}" class="card-img-top" style="width: 230px; height: 280px; margin: 10px;border-radius: 10px">
    <div class="card-body">
        <h5 class="card-title " style="
             overflow: hidden;
                      display: -webkit-box;
                      -webkit-line-clamp: 2;
                      -webkit-box-orient: vertical;
                      line-height: 1.3em;
                      height: 2.5em;
            ">
            {{$book->name}}
        </h5>
        <em class="card-text " style="
          overflow: hidden;
          display: -webkit-box;
          -webkit-line-clamp: 4;
          -webkit-box-orient: vertical;
          line-height: 1.3em;
          height: 5.4em;
          margin-bottom: 7px;
            ">
            {{$book->content}}
        </em>
        <div class="d-flex justify-content-center">
            Осталось в библиотеке : {{$book->count}}
        </div>
        <div class="d-flex justify-content-center">
            @if(in_array($book->id, $book_id_array))
                <p class="text-danger">У Вас уже есть эта книга!</p>
            @elseif($book->count >0 )
                <form action="/books/add/{{$book->id}}" method="post" class="form-inline ">
                    @csrf
                    <button type="submit" class="btn btn-success">Добавить в резерв</button>
                </form>
            @else
                <p class="text-danger">Нет в наличии</p>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <form action="/book_description/{{$book->id}}" method="post" class="form-inline ">
                @csrf
                <button type="submit" class="btn btn-secondary" style="margin-top: 10px">
                    Описание книги
                </button>
            </form>
        </div>
    </div>
</div>

