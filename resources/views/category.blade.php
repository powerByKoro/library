

<div class="list-group">
    @foreach ($categories as $category)
        <form action="/category/{{$category->id}}" method="post">
            @csrf
            <button class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-3"> <h4 class="">УДК - {{$category->YDK}}</h4></div>
                    <div class="col-8"><h4 class="">{{$category->name}}</h4></div>
                </div>
            </button>
        </form>
    @endforeach
</div>
