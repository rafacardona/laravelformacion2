@component('mail::message')
# Hola Admin,
<br>
<p>
    Has recibido un mensaje desde el formulario de contacto en  {{config('app.name')}}
</p>
<p>
    Motivo del mensaje: {{$textSubject}}
</p>
<p>
    {{$textMessage}}
</p>
@endcomponent
