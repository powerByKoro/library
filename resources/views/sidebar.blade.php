

<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">




    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center" style="margin-top: 20px">
        <li class="nav-item">
            <a href="/" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                <img src="{{asset('storage/uploads/home.svg')}}" alt="" class="" style="height: 40px">
            </a>
        </li>
        <li>
            <a href="/authors_page" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                <img src="{{asset('storage/uploads/book.svg')}}" alt="" class="" style="height: 40px">
            </a>
        </li>
        <li>
            <a href="/information" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                <img src="{{asset('storage/uploads/contacts.svg')}}" alt="" class="" style="height: 40px">
            </a>
        </li>
    </ul>
    <div class="dropdown border-top">
        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="
                @if(Auth::user())
                            {{asset('storage/'. Auth::user()->img)}}
                            @else
                            {{asset('images/маи.png')}}
                            @endif
                " alt="mdo" width="70" height="60" class="rounded">
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">

            <li><a class="dropdown-item" href="/account">Личный кабинет</a></li>
            <li><a class="dropdown-item" href="/information">Контактная информация</a></li>
            <li><hr class="dropdown-divider"></li>
           @guest()
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                    </li>
                @endif
            @else
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выход') }}
                </a>
            @endguest
        </ul>
    </div>
</div>
