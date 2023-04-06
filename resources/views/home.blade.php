@include("partials.header", ["title" => "VegaExpress"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("partials.searchBar")

@include("partials.newProducts", ["products" => $lastProducts])



@include("partials.footer")