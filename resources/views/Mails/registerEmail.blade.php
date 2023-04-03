<!DOCTYPE html>

<h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 32px; text-align: center;">Olá {{$user->name}}</h1>
<p>Clique no botão abaixo para confirmar seu e-mail</p>
<a
    style="color: #FFF; background-color: #308be6; padding-left: 20px; padding-right: 20px; padding-top: 6px; padding-bottom: 6px; text-decoration: none;"
    href="{{route("user.email.confirm.check", ["token" => $user->token])}}">Confirmar Email</a>