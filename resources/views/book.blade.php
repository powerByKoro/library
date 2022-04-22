<div class="card" style="max-width: 250px; min-width: 250px; margin: 10px; border-radius: 15px; background-color: #f5f5f5">
    <img src="{{asset('images/'.$book->image . '.jpg')}}" class="card-img-top" style="width: 230px; height: 200px; margin: 10px;border-radius: 10px">
    <div class="card-body">
        <h5 class="card-title text-truncate">{{$book->name}}</h5>
        <p class="card-text text-truncate">{{$book->content}}</p>
        <div class="d-flex justify-content-center">
            <form action="/books/add/{{$book->id}}" method="post" class="form-inline ">
                @csrf
                <button type="submit" class="btn btn-success">Добавить в личный кабинет</button>
            </form>
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

