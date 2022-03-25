<h1>Каталог товаров</h1>
<ul>

    <a href="{{route('basket.index')}}" class="">Корзина епта бля</a>
    @foreach ($products as $product)
        <div class="col-md-6">
            <p>{{$product->name}}</p>
            <!-- Форма для добавления товара в корзину -->
            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                  method="post" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-success">Добавить в корзину</button>
            </form>
        </div>
    @endforeach
</ul>
