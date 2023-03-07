<div class="container mx-auto w-auto m-0 p-0">
    <form class="rounded-0 d-block w-auto form-create-product" method="POST" action="">
        @csrf

        <div class="container container-create-product d-flex">
            <div class="col-lg-8 d-flex flex-column pe-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titulo">
                    <label for="title">Titulo</label>
                </div>

				<div class="form-floating mb-3">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Preço">
                    <label for="price">Preço</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Coloque sua descrição aqui" id="description"></textarea>
                    <label for="description">Descrição</label>
                </div>
            </div>
            <div class="col-lg-4">
            	<form class="form-floating">
					<label for="imgsInput">Imagens</label>
                	<input type="file" class="form-control" accept="image/*" multiple id="imgsInput" name="imgsInput" placeholder="name@example.com" value="test@example.com">
              </form>
            </div>
        </div>

    </form>
</div>