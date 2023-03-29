@include("partials.header", ["title" => "VegaExpress"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("products.productPage", ["produto" => $produto, "author" => $author])



@include("partials.footer")