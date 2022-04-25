<div class="card-group">
    @foreach ($categories as $category)
        <div class="card text-center">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h4 class="card-title">{{$category->name}}</h4>
                <p class="card-text">{{$category->content}}</p>
                <form action="/category/{{$category->id}}" method="post" class="form-inline ">
                    @csrf
                    <button type="submit" class="btn btn-success">Просмотр категории</button>
                </form>
            </div>
            <div class="card-footer text-muted">

            </div>
        </div>
    @endforeach
</div>

