<div class="container container-loginPage container-editAddress d-flex justify-content-center align-items-center">
    <form method="POST" class="form-login" action="{{route("api.user.address.edit")}}">
        <div class="container-fluid form-legend rounded-top p-2 fs-4 text-center">Alterar Endereço</div>
        @csrf
        <input type="hidden" name="id" value="{{$address->id}}"/>
        <div class="container-fluid p-0 m-0 d-flex flex-column justify-content-center h-auto px-3 my-3">
            <x-form.input name="cep" value="{{$address->cep}}" placeholder="00000-000" label="CEP"/>

            <x-form.input name="bairro" value="{{$address->bairro}}" placeholder="Bairro" label="Bairro"/>

            <x-form.input name="rua" value="{{$address->rua}}" placeholder="Rua" label="Rua"/>

            <x-form.input name="numero" value="{{$address->numero}}" placeholder="Número" label="Número"/>
        

            
        </div>
        <x-form.buttons submitText="Alterar" resetText="Resetar" />

        

        
        
        
        
        
    </form>

    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById("cep"),
                {
                    mask: "00000-000"
                }
            );
    </script>
</div>