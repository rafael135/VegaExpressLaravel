<div class="user-profile-config">
    <div class="user-img">
        @if($loggedUser->avatar != null)
            <img src="{{$loggedUser->avatar}}" alt=""/>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
            </svg>
        @endif
    </div>

    <div class="user-name">
        <div class="form-floating">
            <input type="text" class="form-control" data-reqs="required|minLength=3" value="{{$loggedUser->name}}" id="name" name="name" placeholder="Nome Completo">
            <label for="name">Nome Completo</label>
        </div>
    </div>

    <div class="user-email">
        <div class="form-floating">
            <input type="email" readonly class="form-control" data-reqs="required" value="{{$loggedUser->email}}" id="email" name="email" placeholder="E-mail Registrado">
            <label for="email">E-mail Registrado</label>
        </div>
    </div>
</div>