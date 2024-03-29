<nav class="navbar navbar-expand-lg">
    <div class="container-fluid justify-content-center justify-content-md-end h-100 p-0">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse h-100" id="navbarTogglerDemo01">
            <a class="navbar-brand px-3" href="{{route("home")}}">VegaExpress</a>
            <ul class="navbar-nav mx-lg-0 ms-lg-auto mx-md-auto mb-lg-0 h-100 d-flex justify-content-end align-items-center">
                <li class="nav-item">
                    @if($loggedUser != false)
                        <a href="" id="btn-user-sideBar" class="nav-link d-flex justify-content-center align-items-center">
                            <i id="btn-user-icon" class="bi bi-person-circle"></i>
                        </a>
                    @else
                        <a href="" id="btn-user-sideBar" class="nav-link d-flex justify-content-center align-items-center">
                            <i id="btn-user-icon" class="bi bi-box-arrow-right text-danger"></i>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    

</nav>

<aside id="asideUser-menu">
    <div id="sideBar-menu" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                @if($loggedUser != false)
                    @if($loggedUser->avatar != null)
                        <img src="{{url("storage")}}/{{$loggedUser->avatar}}" alt="" width="32" height="32" class="rounded-circle me-2">
                    @else
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    @endif
                    
                @else
                    <i id="img-usr" class="bi bi-person-circle me-2"></i>
                @endif
                <strong>@if($loggedUser != false) 
                    {{$loggedUser->name}}
                @endif</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                @if($loggedUser != false)
                    <li><a class="dropdown-item" href="{{route("api.logout")}}">Sair</a></li>
                @else
                    <li><a class="dropdown-item" href="{{route("auth.showLogin")}}">Entrar</a></li>
                @endif
            </ul>
        </div>
        @if($loggedUser != false)
            <hr/>
        @endif
        <ul class="nav flex-column">
            @if($loggedUser != false)
                <li class="nav-item">
                    <a href="" class="nav-link link-bi active" aria-current="page">
                        <i class="bi bi-house-fill me-1 fs-5"></i>
                        Página inicial
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("user.profile")}}" class="nav-link link-bi text-white">
                        <i class="bi bi-file-earmark-person-fill me-1 fs-5"></i>
                        Perfil
                    </a>
                </li>
                <li>
                    <a href="pedidos.php" class="nav-link link-bi text-white">
                        <i class="bi bi-table me-1 fs-5"></i>
                        Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("user.products")}}" class="nav-link link-bi text-white">
                        <i class="bi bi-grid me-1 fs-5"></i>
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("user.config", ["menuOption" => "profile"])}}" class="nav-link link-bi text-white">
                        <i class="bi bi-person-fill-gear me-1 fs-5"></i>
                        Configurações
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>

<script src="{{asset("js/navbar/sideMenu.js")}}"></script>