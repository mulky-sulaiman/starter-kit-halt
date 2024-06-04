@props(['id' => '', 'size' => 'md'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $sizeClasses = match ($size) {
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-4xl',
        'xl' => 'max-w-7xl',
    };
@endphp

<!-- Modal -->
<div wire:ignore.self x-init="() => {

    let el = document.querySelector('#modal-id-{{ $id }}')
    let modalOptions = {
        placement: 'center-center',
        backdrop: 'static',
        closable: false,
        onHide: () => {
            show = false
        },
        onShow: () => {
            show = true
        }
    };
    let modal = new Modal(el, modalOptions);

    $watch('show', value => {
        if (value) {
            modal.show()
        } else {
            modal.hide()
        }
    });

    // el.addEventListener('hide.modal', function(event) {
    //     show = false
    // })

}" x-data="{ show: @entangle($attributes->wire('model')) }" x-on:close.stop="show = false" x-show="show"
    id="modal-id-{{ $id }}"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    tabindex="-1" aria-hidden="true" aria-labelledby="modal-id-{{ $id }}" x-ref="modal-id-{{ $id }}">
    <div class="relative w-full {{ $sizeClasses }} max-h-full p-4">
        {{ $slot }}
    </div>
</div>
