

    <div class="container container-searchProduct d-flex flex-column justify-content-center align-items-center bg-body-tertiary mx-auto p-0">
        <div class="d-flex flex-column">
            <div class="col-lg-12 d-flex flex-column">
                @if($products != false && count($products) > 0)
                    @foreach ($products as $product)

                        <div class="card card-searchPage m-4">
                            <div class="d-flex row g-0">
                                <div class="searchCard-img">
                                    <img src="https://via.placeholder.com/300x200" class="img-fluid rounded-0" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="card-body p-0 d-flex flex-column justify-content-between h-100">
                                        <h2 title="" class="card-title text-truncate">@php echo($product->title); @endphp</h2>
                                        <span class="products-price ms-auto">R$ @php echo(number_format($product->price, 2, ",", ".")); @endphp</span>
                                    </div>
                                </div>
                                <a class="stretched-link" href="{{route("product.get", ["id" => $product->id])}}"></a>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else

            <div class="conatainer-fluid d-flex justify-content-center align-items-center">
                <span class="badge badge-danger px-4 my-5 fs-2">Nenhum produto encontrado</span>
            </div>

        @endif

        <!--
            <div class="col-lg-3 d-flex flex-column">

            </div>
            -->
        </div>
        
        @if($products != false && count($products) > 0)
            <nav class="mx-auto mt-2" aria-label="...">
                <ul class="pagination">
                    <li class="page-item <?=($pagina == 0) ? "disabled" : ""?>">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        @endif
        


    </div>
    