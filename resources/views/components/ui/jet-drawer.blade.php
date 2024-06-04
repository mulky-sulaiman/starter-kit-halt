@props(['id', 'placement' => 'right'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $placementClasses = match ($placement) {
        'top'
            => 'fixed top-0 left-0 right-0 z-40 w-full p-4 transition-transform -translate-y-full bg-white dark:bg-gray-800',
        'right'
            => 'fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800',
        'left'
            => 'fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800',
        'bottom'
            => 'fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none',
    };
@endphp

<!-- Drawer -->
<div wire:ignore.self x-init="() => {

    let el = document.querySelector('#drawer-id-{{ $id }}')
    let drawerOptions = {
        placement: '{{ $placement }}',
        backdrop: true,
        closable: false,
        onHide: () => {
            show = false
        },
        onShow: () => {
            show = true
        },
        updateOnHide: () => {
            drawer.destroyAndRemoveInstance()
        },
    };
    let drawer = new Drawer(el, drawerOptions);

    $watch('show', value => {
        if (value) {
            //document.body.classList.add('show');
            drawer.show()
        } else {
            //document.body.classList.remove('show');
            drawer.hide()
        }
    });

    // el.addEventListener('hide.bs.offcanvas', function(event) {
    //     show = false
    // })
}" x-data="{ show: @entangle($attributes->wire('model')) }" x-on:close.stop="show = false" x-show="show"
    id="drawer-id-{{ $id }}" class="{{ $placementClasses }}" tabindex="-1" aria-hidden="true"
    aria-labelledby="drawer-id-{{ $id }}" x-ref="drawer-id-{{ $id }}"
    style="display: {{ $attributes->wire('model') ? 'block' : 'none' }};">
    {{ $slot }}
</div>
