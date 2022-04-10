<div class="card-group">
    @foreach ($categories as $category)
        <div class="card" style="max-width: 250px;">
            <img src="{{asset($category->image)}}" class="card-img-top" style="width: 100%; height: 200px;">
            <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
                <p class="card-text">{{$category->content}}</p>
                <form action="/category/{{$category->id}}" method="post" class="form-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">КАТЕГОРИИ</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
