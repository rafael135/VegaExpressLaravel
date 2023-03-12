@include("partials.header", ["title" => "Perfil de " . $loggedUser->name])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("user.profile-info")



@include("partials.footer")