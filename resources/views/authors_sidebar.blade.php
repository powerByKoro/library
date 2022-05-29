

<div class="list-group">
    @foreach ($authors_sidebar as $author)
        <form action="/author/{{$author->id}}" method="post">
            @csrf
            <button class="list-group-item list-group-item-action">
                <h4 class="">{{$author->name}}</h4>
            </button>
        </form>
    @endforeach
</div>
