@include("partials.header", ["title" => "Login"])

@include("partials.navbar", ["loggedUser" => $loggedUser])

<div class="container-fluid container-loginPage d-flex justify-content-center align-items-center">
    <div class="col-12 d-flex justify-content-center align-items-center">
        @include("auth.registerForm", ["errors" => $errors])
    </div>
</div>



@include("partials.footer")