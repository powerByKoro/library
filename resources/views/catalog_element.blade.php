
@foreach ($books as $book)
    <div class="col-md-6">
        <p>{{$book->name}}</p>
        <!-- Форма для добавления товара в корзину -->
        <form action="/books/add/{{$book->id}}" method="post" class="form-inline">
            @csrf
            <button type="submit" class="btn btn-success">Добавить в личный кабинет</button>
        </form>
    </div>
@endforeach

