<div class="container d-flex flex-row bg-body-tertiary p-0 container-profile-config">
    <div class="col-lg-3 col-md-4 profile-config-options">
        <div class="list-group list-group-config_page rounded-0">
            <a href="{{route("user.config", ["menuOption" => "profile"])}}" class="list-group-item py-4 fs-4 list-group-item-action @if($menuOption == false || $menuOption == 'profile') active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                Perfil
            </a>
            <a href="{{route("user.config", ["menuOption" => "security"])}}" class="list-group-item py-4 fs-4 list-group-item-action @if($menuOption == 'security') active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
                Segurança
            </a>
            <a href="{{route("user.config", ["menuOption" => "addresses"])}}" class="list-group-item py-4 fs-4 list-group-item-action @if($menuOption == 'addresses') active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>
                Endereços
            </a>
        </div>
    </div>

    <div class="col-lg-9 col-md-8 bg-body-secondary profile-config-page">
            @if($menuOption == "profile")
                @include("user.config.userProfileConfig", ["loggedUser" => $loggedUser])
            @elseif($menuOption == "security")
                @include("user.config.userSecurityConfig", ["loggedUser" => $loggedUser])
            @elseif($menuOption == "addresses")
                @include("user.config.userAddressesConfig", ["loggedUser" => $loggedUser])
            @else
                <h1>Haha engraçadinho</h1>
            @endif
    </div>
</div>