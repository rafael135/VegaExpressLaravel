<div class="container container-lastProducts p-0 mt-4 mb-4">
    <div class="title">
        <h2 class="">Ultimos Adicionados</h2>
    </div>
    <div class="container-searchProduct justify-content-evenly align-items-center">
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
    </div>
</div>