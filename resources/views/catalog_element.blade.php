


@if(count($books))
    <div class="card-group">
    @foreach ($books as $book)
        @include('book')
    @endforeach
    </div>
@else
<div class="row">
    <div class="col-6 ">
        <h2 class="text-danger" >Книги не найдены !</h2>
    </div>
</div>
@endif



