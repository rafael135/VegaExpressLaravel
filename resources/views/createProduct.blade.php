@include("partials.header", ["title" => "Adicionar novo produto"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("user.product-create")


@include("partials.footer")