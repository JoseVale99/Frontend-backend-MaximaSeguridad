@extends('layouts.main')
@section('titulo', 'Solicitud de recuperación de contraseña')
@section('contenido')
@component('mail::message')
<div class="text-center">
    <img src="https://i.ibb.co/b6RqSDY/Logo-removebg-preview.png" alt="Sistemas de Maxima Seguridad"
        width="40" height="40" class="mx-3 align-items-center">
</div>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('¡Hola!')
@endif
@endif


{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'primary':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'success';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Si tiene problemas para hacer clic en el \":actionText\" , copie y pegue la URL a continuación\n".
    'en su navegador web:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>


@endslot
@endisset
{{-- @include('plantilla.footer') --}}
@endcomponent
@endsection
