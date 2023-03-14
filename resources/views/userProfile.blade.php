@include("partials.header", ["title" => "Perfil de " . $loggedUser->name])

@include("partials.navbar", ["loggedUser" => $loggedUser])

@include("user.profile-info", ["loggedUser" => $loggedUser, "menuOption" => $menuOption])



@include("partials.footer")