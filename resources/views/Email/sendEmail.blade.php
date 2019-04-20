@component('mail::message')
Te damos la bienvenia a nuestro sistema de PQRS, recuerda para acceder a nuestra aplicación debes hacerlo mediante<br>
tu IDENTIFICACION y CONTRASEÑA...

Hemos generado una contraseña para ti: {{$password}}

@component('mail::button', ['url' => 'http://localhost:4200/login'])
Acceder
@endcomponent

Thanks,<br>
UEB PQRS

{{--{{ config('app.name') }}--}}
@endcomponent
