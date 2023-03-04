@include("partials.header", ["title" => "VegaExpress"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("user.productsUsr", ["produtos" => $produtos])



@include("partials.footer")