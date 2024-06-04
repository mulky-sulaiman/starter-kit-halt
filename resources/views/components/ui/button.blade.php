@props([
    'type' => 'primary',
    'size' => 'md',
    'tag' => 'button',
    'href' => '/',
    'submit' => false,
    'rounded' => 'full',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'px-2.5 py-1.5 text-xs font-medium rounded-' . $rounded,
        'md' => 'px-4 py-2 text-sm font-medium rounded-' . $rounded,
        'lg' => 'px-5 py-3  text-base font-medium rounded-' . $rounded,
        'xl' => 'px-6 py-3.5 text-base font-medium rounded-' . $rounded,
        '2xl' => 'px-7 py-4 text-base font-medium rounded-' . $rounded,
    };
@endphp
{{-- text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 --}}
@php
    $typeClasses = match ($type) {
        // 'primary'
        //     => 'bg-primary-800 dark:bg-primary-100 text-white dark:text-primary-700 hover:bg-primary-900 dark:focus:ring-offset-primary-900 dark:focus:ring-primary-100 dark:hover:bg-white dark:hover:text-primary-800 focus:ring-2 focus:ring-primary-900 focus:ring-offset-2',
        'primary'
            => 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800',
        'secondary'
            => 'bg-white border text-gray-500 hover:text-gray-700 border-gray-200/70 dark:focus:ring-offset-gray-900 dark:border-gray-400/10 hover:bg-gray-50 active:bg-white dark:focus:ring-gray-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200/60 dark:bg-gray-800/50 dark:hover:bg-gray-800/70 dark:text-gray-400 focus:shadow-outline',
        'success'
            => 'bg-success-600 text-white hover:bg-success-600/90 focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-900 focus:bg-success-700/90 focus:ring-success-700',
        'info'
            => 'bg-info-600 text-white hover:bg-info-600/90 focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-900 focus:bg-info-700/90 focus:ring-info-700',
        'warning'
            => 'bg-warning-500 text-white hover:bg-warning-500/90 focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-900 focus:bg-warning-600/90 focus:ring-warning-600',
        'danger'
            => 'bg-danger-600 text-white hover:bg-danger-600/90 focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-900 focus:bg-danger-700/90 focus:ring-danger-700',
    };
@endphp

@php
    switch ($tag ?? 'button') {
        case 'button':
            $tagAttr = $submit ? 'button type="submit"' : 'button type="button"';
            $tagClose = 'button';
            break;
        case 'a':
            $link = $href ?? '';
            $tagAttr = 'a  href="' . $link . '"';
            $tagClose = 'a';
            break;
        default:
            $tagAttr = 'button type="button"';
            $tagClose = 'button';
            break;
    }
@endphp

<{!! $tagAttr !!} {!! $attributes->except(['class']) !!}
    class="{{ $tag == 'button' ? 'uppercase tracking-widest' : '' }} {{ $sizeClasses }} {{ $typeClasses }} cursor-pointer inline-flex items-center w-full justify-center disabled:opacity-50 font-semibold focus:outline-none">
    {{ $slot }}
    </{{ $tagClose }}>
