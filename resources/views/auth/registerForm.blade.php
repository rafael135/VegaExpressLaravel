<<<<<<< HEAD
<form class="form-login p-0" id="form-registro" method="POST" action="{{route("api.register")}}">
    @csrf
=======
<form class="form-login p-0" id="form-registro" method="POST" action="{{route("auth.register")}}">
>>>>>>> 9b47ec95b516105f01a5e658f57ef87a21b6dcaf
    <div class="container-fluid form-legend rounded-top p-2 fs-4 text-center">Registro</div>
    <div class="container-fluid p-0 m-0 d-flex flex-column justify-content-center h-auto px-3 my-3">
        @csrf

        <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text"
            class="form-control" name="name" id="name" required autocomplete="name" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted d-none">Help text</small>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required id="email" aria-describedby="emailHelpId" placeholder="exemplo@email.com">
        <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
        </div>

        <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text"
            class="form-control" name="cpf" id="cpf" aria-describedby="helpId" minlength="14" required placeholder="000.000.000-00">
        <small id="helpId" class="form-text text-muted d-none">Help text</small>
        </div>

        <div class="mb-3">
        <label for="password" class="form-label">Senha:</label>
        <input type="password" class="form-control" name="password" minlength="8" required id="password" autocomplete="current-password" placeholder="Min de 8 caracteres">
        </div>

        <button type="submit" class="btn btn-dark">Registrar</button>
    </div>
</form>

<script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById("cpf"),
            {
                mask: "000.000.000-00"
            }
        )
</script>