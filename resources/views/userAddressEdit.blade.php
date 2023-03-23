@include("partials.header", ["title" => "VegaExpress"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("address.form.addressForm", ["address" => $address])



@include("partials.footer")