

<div class="list-group">
    @foreach ($categories as $category)
        <a href="#" class="list-group-item list-group-item-action"><h4 class="">{{$category->YDK}}    -     {{$category->name}}</h4> </a>
    @endforeach
</div>
