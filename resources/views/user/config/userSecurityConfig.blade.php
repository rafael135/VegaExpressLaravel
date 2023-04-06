<div class="user-security-config">
    <div class="user-email d-flex my-1">
        <div class="form-floating d-flex flex-column flex-grow-1">
            <input type="email" readonly class="form-control {{($loggedUser->email_verified == 0) ? 'is-invalid' : 'is-valid'}}" data-reqs="required" value="{{$loggedUser->email}}" id="email" name="email" placeholder="E-mail Registrado">
            <label for="email">E-mail Registrado</label>
            @if($loggedUser->email_verified == 0)
                <div id="invalidMailCheck" class="invalid-feedback">
                    E-mail não verificado
                </div>
            @else
                <div id="invalidMailCheck" class="valid-feedback">
                    E-mail verificado
                </div>
            @endif
        </div>
        @if($loggedUser->email_verified == 0)
            <button id="btnSendEmail" onclick="sendEmail(this)" class="btn btn-dark">Enviar Confirmação</button>
        @else
            <button id="btnSendEmail" onclick="sendEmail(this)" class="btn btn-dark text-danger" disabled>Enviar Confirmação</button>
        @endif
        
    </div>
    @if($loggedUser->email_verified == 0)
        <script>
            let sendRoute = "{{route('user.email.confirm.send')}}";
            let csrfToken = "{{csrf_token()}}";
        </script>
        <script src="{{asset("js/profileConfig/sendConfirmEmail.js")}}"></script>
    @endif
</div>