<div class="container-fluid d-flex justify-content-center align-items-center container-usrPrincipal m-0 p-0">
    <div class="container-fluid container-usrProduct p-0 m-0">
        <div class="d-flex row m-0 p-0">
            <div class="col-lg-3 p-0 m-0 usrProducts-options py-2">
                <div class="d-flex flex-column">
                    <div class="d-flex row align-items-center justify-content-center m-0">
                        <div class="col-md-8 col-lg-8 p-0">
                            <div class="form-floating">
                                <input type="text" autocomplete="off" class="form-control rounded-0" id="searchInput"
                                    placeholder="Pesquisar" name="search" value="">
                                <label for="searchInput">Pesquisar</label>
                            </div>
                        </div>

                        <div class="btn-searchBar col-md-2 col-lg-2 p-0">
                            <button class="btn btn-primary rounded-0">
                                <i class="bi bi-search fs-4"></i>
                            </button>
                        </div>

                        <div class="col-lg-10 d-flex justify-content-center align-items-center p-0 m-0">
                            
                            <a type="button" href="{{route("user.product.create")}}" class="btn btn-primary btn-addProduct rounded-0 w-100">
                                <i class="bi bi-plus-circle fs-4"></i>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 justify-content-center fw-semibold fs-5 align-items-end">
                        <div class="usrProduct-qte">Quantidade de produtos: <span class="badge bg-primary"
                                id="qte-products">@php echo($produtos == false ? "0" : count($produtos)); @endphp</span></div>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-9 cards-usrProducts d-flex flex-wrap justify-content-evenly align-content-start p-2 @if($produtos == false)@php { echo "justify-content-center align-items-center"; } @endphp @endif">
                @if($produtos != false)
                    @foreach($produtos as $produto)
                <div class="col-lg-2 m-0 p-0">
                    <div class="card card-productUsr text-white bg-white rounded-0 mx-2 mb-2">
                        <img class="card-img-top" src="src/img/produto-exemplo.jpg" alt="Title">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">@php echo($produto->title); @endphp</h5>
                                <p class="card-text fs-6">R$ @php echo(number_format($produto->price, 2, ",", ".")); @endphp</p>
                                <a class="card-usrProduct-link stretched-link" href="produto.php?id=@php echo($produto->id); @endphp"></a>
                        </div>
                    </div>
                </div>
                    @endforeach
                @else
                    <h2 class="text-black fs-2">Você não possui nenhum produto</h2>
                @endif
            </div>
        </div>
    </div>
</div>


<script src="{{asset("js/usrProducts/usrProducts.js")}}"></script>