<div class="container mx-auto w-auto m-0 p-0">
    <form id="form-create-product" class="rounded-0 d-block w-auto form-create-product" method="POST" action="">
        @csrf

        <div class="container container-create-product d-flex">
            <div class="col-lg-8 d-flex flex-column pe-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" data-reqs="required|minLength=3" id="title" name="title" placeholder="Titulo">
                    <label for="title">Titulo</label>
                    <small class="form-text text-danger error-msg d-none"></small>
                </div>

				<div class="form-floating mb-3">
                    <input type="text" class="form-control" data-reqs="required" id="price" name="price" placeholder="Preço">
                    <label for="price">Preço</label>
                    <small class="form-text text-danger error-msg d-none"></small>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="description" data-reqs="" placeholder="Coloque sua descrição aqui" id="description"></textarea>
                    <label for="description">Descrição</label>
                    <small class="form-text text-danger error-msg d-none"></small>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column">
                <div class="flex-fill">
				    <label for="imgsInput">Imagens</label>
                    <input type="file" class="form-control" accept="image/*" multiple id="imgsInput" data-reqs="" name="imgsInput">
                    <small class="form-text text-danger error-msg d-none"></small>
                </div>
                <div class="flex-fill d-flex align-self-end align-items-end">
                    <button class="btn btn-light btn-create-product bg-success" id="submitButton">Criar</button>
                </div>
            </div>


        </div>

    </form>
    <script type="text/javascript">
        let createRoute = "{{route("api.user.createProduct")}}"
    </script>
    <script src="{{asset("js/usrProducts/createProduct.js")}}"></script>
</div>