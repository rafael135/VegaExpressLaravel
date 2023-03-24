<div class="user-addresses-config">
    <div class="address-add">
        <button class="btn btn-primary btn-add-address" data-bs-toggle="modal" data-bs-target="#addressAddModal">
            Adicionar novo endereço
        </button>
    </div>

    <div class="addresses mt-4">
        <div class="addresses-head row">
            <div class="active col-lg-1">Ativo</div>
            <div class="cep col-lg-2">CEP</div>
            <div class="bairro col-lg-3">Bairro</div>
            <div class="rua col-lg-2">Rua</div>
            <div class="numero col-lg-2">Número</div>
            <div class="actions col-lg-2">Ações</div>
        </div>

        @if(count($loggedUser->addresses) != 0)
            @foreach ($loggedUser->addresses as $address)
                @include("user.config.components.address", ["data" => $address])
            @endforeach
        @endif
        
    </div>
</div>

<!-- Modal para adicionar endereço -->
<div class="modal fade" id="addressAddModal" tabindex="-1" aria-labelledby="addressAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="addressAddModalLabel">Adicionar novo endereço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-address" action="{{route("api.user.address.add")}}" method="POST">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="000000-000">
                        <label for="cep">CEP</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="bairro" name="bairro">
                        <label for="bairro">Bairro</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="rua" name="rua">
                        <label for="rua">Rua</label>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" minlength="1" id="numero" name="numero">
                        <label for="numero">Número</label>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn-add" class="btn btn-success">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById("cep"),
            {
                mask: "00000-000"
            }
        )
</script>

<script src="{{asset("js/profileConfig/addAddress.js")}}"></script>