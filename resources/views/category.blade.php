<div class="card-group">
    @foreach ($categories as $category)
        <div class="card" style="max-width: 300px; min-width: 300px; margin: 40px; border-radius: 15px; background-color: #f5f5f5">
            <img src="{{asset('images/'. $category->image. '.jpg')}}" class="card-img-top" style="width: 280px; height: 220px; margin: 10px;border-radius: 10px">
            <div class="card-body">
                <h5 class="card-title text-truncate">{{$category->name}}</h5>
                <p class="card-text text-truncate">{{$category->content}}</p>
                <div class="d-flex justify-content-center">
                    <form action="/books/add/{{$category->id}}" method="post" class="form-inline ">
                        @csrf
                        <button type="submit" class="btn btn-success">Просмотр категорий</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
