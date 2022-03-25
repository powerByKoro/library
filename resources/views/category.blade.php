<h1>Категория: {{ $category->name }}</h1>
<ul>
    @foreach ($products as $product)
        <li>
            <a href="{{ route('product', ['slug' => $product->slug]) }}">
                {{ $product->name }}
            </a>
        </li>
    @endforeach
</ul>
