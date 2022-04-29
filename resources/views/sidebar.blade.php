


<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; border-radius: 20px; margin-top: 90px">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="/"></use></svg>
        <span class="fs-4"><h3>Библиотека Маевец</h3></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item ">
            <a href="/account" class="nav-link text-white active ">
                Личный Кабинет
            </a>
        </li>

    </ul>
    <hr>
    <div class="dropdown">
        <a href="/account" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="
                @if(Auth::user())
                    {{asset('/storage/'. Auth::user()->img)}}
                @else
                         {{asset('/images/default.jpg')}}
                @endif
                " alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>
                    @if(Auth::user())
                        {{ Auth::user()->name }}
                    @else
                        Абракадабра
                    @endif
                </strong>
        </a>
        <ul class="" style="margin-top: 10px"><a href="/authors_page" class="text-decoration-none" >Авторы</a></ul>
        <ul class=""><a href="/" class="text-decoration-none">Книги</a></ul>
        <ul class=""><a href="/information" class="text-decoration-none">Контактная информация</a></ul>
    </div>
</div>
