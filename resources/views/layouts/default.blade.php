<?php
use Illuminate\Support\Str;
?>

@props(['title' => '', 'head' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="{{ config('app.name', 'HALT') }}">
    @if ($head)
        {!! $head !!}
    @else
        <meta name="description" content="{{ $title }}" />
        <meta name="keywords" content="{{ Str::lower(str_replace(' ', ',', $title)) }}" />
    @endif

    <x-statics.header-script />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <title>{{ $title ? $title . ' - ' . config('app.name', 'HALT') : config('app.name', 'HALT') }}</title>
</head>

<body x-data="$store.confirmDialog" class="font-sans antialiased bg-gray-50 dark:bg-gray-900"
    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' hx-indicator=".progress" hx-boost="true">
    <div class="progress" style="height: 3px;">
        <div class="bg-primary-600 indeterminate"></div>
    </div>
    {{ $slot }}
    <x-statics.bottom-script />
    <noscript>
        <div
            style="position: fixed; top: 0px; left: 0px; z-index: 30000000;
                        height: 100%; width: 100%; background-color: #FFFFFF">
            <div style="display: flex; justify-content: center; align-items: center; top: 50%; height: 100%;">
                <img src="assets/images/noscript.png" />
            </div>
        </div>
    </noscript>
    @stack('scripts')
</body>

</html>
