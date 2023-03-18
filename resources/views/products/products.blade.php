

    <div class="container container-searchProduct d-flex flex-column justify-content-center align-items-center bg-body-tertiary mx-auto p-0 pt-4">
        <div class="d-flex flex-row flex-wrap justify-content-center">
            
                @if($products != false && count($products) > 0)
                    @foreach ($products as $product)

                        <div class="card card-searchPage mx-3 mb-3">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{$product->title}}</h5>
                                <p class="card-text products-price fs-3">R$ @php echo(number_format($product->price, 2, ',', '.')); @endphp</p>
                                <a class="stretched-link" href="{{route("product.get", ["id" => $product->id])}}"></a>
                            </div>
                        </div>
                    @endforeach
            
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
                    <li class="page-item @php echo(($pagina == 0) ? 'disabled' : ''); @endphp ">
                        <a class="page-link" href="{{route("product.search", ["search" => $searchTerm, "orderDate" => $orderDate, "qteItems" => $qteItems, "pagina" => $pagina - 1])}}"><</a>
                    </li>
                    <li class="page-item @php echo(($pagina - 1 < 0) ? 'disabled' : ''); @endphp">
                        <a class="page-link" href="{{route("product.search", ["search" => $searchTerm, "orderDate" => $orderDate, "qteItems" => $qteItems, "pagina" => $pagina - 1])}}">@php if($pagina - 1 < 0) { echo("#"); } else { echo($pagina); } @endphp</a>
                    </li>

                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="{{route("product.search", ["search" => $searchTerm, "orderDate" => $orderDate, "qteItems" => $qteItems, "pagina" => $pagina])}}">{{$pagina + 1}}</a>
                    </li>

                    <li class="page-item @php if($pagina + 1 > $maxPaginas) { echo("disabled"); } @endphp">
                        <a class="page-link" href="{{route("product.search", ["search" => $searchTerm, "orderDate" => $orderDate, "qteItems" => $qteItems, "pagina" => $pagina + 1])}}">{{$pagina + 2}}</a>
                    </li>

                    <li class="page-item @php if($pagina + 1 > $maxPaginas) { echo("disabled"); } @endphp">
                        <a class="page-link" href="{{route("product.search", ["search" => $searchTerm, "orderDate" => $orderDate, "qteItems" => $qteItems, "pagina" => $pagina + 1])}}">></a>
                    </li>
                </ul>
            </nav>
        @endif
        


    </div>
    