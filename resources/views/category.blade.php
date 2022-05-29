

<div class="list-group">
    @foreach ($categories as $category)
        <form action="/category/{{$category->id}}" method="post">
            @csrf
            <button class="list-group-item list-group-item-action">
                <h4 class="">УДК - {{$category->YDK}}</h4>
                <h4 class="">{{$category->name}}</h4>
            </button>
        </form>
    @endforeach
</div>
