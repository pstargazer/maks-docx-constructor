<header class="py-2 bg-dark text-white">
    <div class="container-my">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center text-white text-decoration-none fs-5">
                Договоры МАКС
            </a>
            <ul class="nav col-12 col-lg-auto  mb-2  mb-md-0">
                <li><a href="{{route('client.index')}}" class="nav-link px-2 text-white">Клиенты</a></li>
                <li><a href="{{route('contract.index')}}" class="nav-link px-2 text-white">Договоры</a></li>
                <li><a href="{{route('import')}}" class="nav-link px-2 text-white">Импорт</a></li>
                {{-- <li><a href="{{route('logout')}}" class="nav-link px-2 text-white">Импорт</a></li> --}}
                <li><form action="{{route('logout')}}" method="post">@csrf<button id="logout" class="btn btn-outline-light">Выход</button></form></li>
            </ul>
        </div>
    </div>
</header>
