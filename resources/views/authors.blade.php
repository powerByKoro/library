

<div class="card-group">

@foreach ($authors as $author)
    <div class="card" style="max-width: 250px;">
        <img src="{{asset($author->image)}}" class="card-img-top" style="width: 100%; height: 200px;">
        <div class="card-body">
            <h5 class="card-title">{{$author->name}}</h5>
            <p class="card-text">{{$author->content}}</p>
            <form action="/author/{{$author->id}}" method="post" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-success">посмотреть книженции автора</button>
            </form>
        </div>
    </div>
@endforeach

</div>
