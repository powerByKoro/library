

<div class="card-group">

@foreach ($authors as $author)
        <div class="card" style="max-width: 250px; min-width: 250px; margin: 10px; border-radius: 15px; background-color: #f5f5f5">
            <img src="{{asset($author->image)}}" class="card-img-top" style="width: 230px; height: 200px; margin: 10px;border-radius: 10px">
            <div class="card-body">
                <h5 class="card-title text-truncate">{{$author->name}}</h5>
                <p class="card-text text-truncate">{{$author->content}}</p>
                <div class="d-flex justify-content-center">
                    <form action="/books/add/{{$author->id}}" method="post" class="form-inline ">
                        @csrf
                        <button type="submit" class="btn btn-success">Просмотреть книги Авторов</button>
                    </form>
                </div>
            </div>
        </div>
@endforeach

</div>
