<form class="form-login p-0 pb-2" id="form-registro" method="POST" action="{{route("api.login")}}">
    @csrf
    <div class="container-fluid form-legend rounded-top p-2 fs-4 text-center">Login</div>
    <div class="container-fluid p-0 m-0 d-flex flex-column justify-content-center h-auto px-3 my-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required id="email" aria-describedby="emailHelpId"
                placeholder="exemplo@email.com" autocomplete="email"/>
            <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="password" minlength="8" required id="password" autocomplete="current-password"
                placeholder="Min de 8 caracteres"/>
            <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
        </div>
        

        <button type="submit" class="btn btn-dark">Login</button>
    </div>
    <a href="{{route("auth.showRegister")}}" class="link-existent_account mx-auto d-flex flex-column">
        Não tem uma conta? Clique aqui!
        <div class="mx-auto"></div>
    </a>
</form>

