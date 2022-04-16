
<div class="card-group">
    @php

    @endphp
    @if(count($books))
        @foreach ($books as $book)
            @include('book')
        @endforeach

    @else
    <p class="text-danger">Книги не найдены</p>
    @endif
</div>


