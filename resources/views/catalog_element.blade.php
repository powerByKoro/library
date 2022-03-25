
@foreach ($products as $product)
    <div class="col-md-6">
        <p>{{$product->name}}</p>
        <!-- Форма для добавления товара в корзину -->
        <form action="/account/add/{{$product->id}}" method="post" class="form-inline">
            @csrf
            <button type="submit" class="btn btn-success">Добавить в личный кабинет</button>
        </form>
    </div>
@endforeach

