@include("partials.header", ["title" => "Pesquisando por: $searchTerm"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("partials.searchBar")


@include("products.products", ["products" => $products])



@include("partials.footer")