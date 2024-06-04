@props(['title' => '', 'head' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  --}}
    @if ($head)
        {!! $head !!}
    @endif

    <x-statics.header-script />
    @vite(['resources/css/main.css', 'resources/js/main.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <title>{{ $title ? $title . ' - ' . config('app.name', 'VITALL') : config('app.name', 'VITALL') }}</title>
</head>

<body x-data="$store.confirmDialog" class="font-sans antialiased bg-gray-50 dark:bg-gray-900"> {{ $slot }}
    <x-statics.bottom-script />
    @persist('noscript')
    <noscript>
        <div
            style="position: fixed; top: 0px; left: 0px; z-index: 30000000;
                        height: 100%; width: 100%; background-color: #FFFFFF">
            <div style="display: flex; justify-content: center; align-items: center; top: 50%; height: 100%;">
                <img src="assets/images/noscript.png" />
            </div>
        </div>
    </noscript>
    @endpersist('noscript')
</body>

</html>
