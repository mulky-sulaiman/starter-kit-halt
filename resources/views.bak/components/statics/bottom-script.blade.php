<!-- Reusable Modals -->
<livewire:modals.pop-up-modal />
<livewire:modals.drawer-modal />
<x-toaster-hub />
<livewire:loader />
{{-- <livewire:toast /> --}}
<x-ui.speed-dial />

<!-- Confirm Dialog -->
<div id="confirm-dialog-modal" data-modal-backdrop="static" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-h-full p-4"
        x-bind:class="{
            'max-w-md': size == 'sm',
            'max-w-lg': size == 'md',
            'max-w-4xl': size == 'lg',
            'max-w-7xl': size == 'xl',
        }">
        <div class="relative bg-white border-t-4 rounded-lg shadow dark:bg-gray-700"
            :class="{
                'border-warning-500 dark:border-warning-400': type == 'warning',
                'border-success-500 dark:border-success-400': type == 'success',
                'border-danger-700 dark:border-danger-600': type == 'danger',
                'border-info-500 dark:border-info-400': type == 'info',
            }">
            <!-- Header -->
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="confirm-dialog-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Content -->
            <div class="p-4 text-center md:p-5">
                <!-- Body -->
                <h2 class="mb-5 text-xl font-medium tracking-widest uppercase"
                    x-bind:class="{
                        'text-warning-500 dark:text-warning-400': type == 'warning',
                        'text-success-500 dark:text-success-400': type == 'success',
                        'text-danger-700 dark:text-danger-600': type == 'danger',
                        'text-info-500 dark:text-info-400': type == 'info',
                    }"
                    x-text="headTitle" x-show="headTitle != ''"></h2>
                <span x-show="useIcon">
                    <x-tabler-alert-square-rounded class="w-12 h-12 mx-auto mb-4 text-warning-500 dark:text-warning-400"
                        aria-hidden="true" x-show="type == 'warning'" />
                    <x-tabler-square-rounded-check class="w-12 h-12 mx-auto mb-4 text-success-500 dark:text-success-400"
                        aria-hidden="true" x-show="type == 'success'" />
                    <x-tabler-square-rounded-x class="w-12 h-12 mx-auto mb-4 text-danger-700 dark:text-danger-600"
                        aria-hidden="true" x-show="type == 'danger'" />
                    <x-tabler-info-square-rounded class="w-12 h-12 mx-auto mb-4 text-info-500 dark:text-info-400"
                        aria-hidden="true" x-show="type == 'info'" />
                </span>
                <div class="flex-row mb-5 gap-y-2">
                    <h3 class="text-lg font-normal"
                        x-bind:class="{
                            'text-warning-500 dark:text-warning-400': type == 'warning',
                            'text-success-500 dark:text-success-400': type == 'success',
                            'text-danger-700 dark:text-danger-600': type == 'danger',
                            'text-info-500 dark:text-info-400': type == 'info',
                        }"
                        x-text="title" x-show="title != ''"></h3>
                    <p class="text-gray-500 dark:text-gray-400" x-text="message" x-show="message != ''"></p>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-center gap-x-3">
                    <span x-show="useCancel" class="w-full">
                        <x-ui.button-only size="sm" class="w-full" type="button" variant="light"
                            data-modal-hide="confirm-dialog-modal">
                            <span x-text="labelCancel"></span>
                        </x-ui.button-only>
                    </span>
                    <span x-show="useOk" class="w-full">
                        <x-ui.button-only size="sm" class="w-full" type="button" variant="warning"
                            data-modal-hide="confirm-dialog-modal" x-show="type == 'warning'"
                            x-on:click.prevent="$dispatch(target);target='';">
                            <span x-text="labelOk"></span>
                        </x-ui.button-only>
                        <x-ui.button-only size="sm" class="w-full" type="button" variant="success"
                            data-modal-hide="confirm-dialog-modal" x-show="type == 'success'"
                            x-on:click.prevent="$dispatch(target);target='';">
                            <span x-text="labelOk"></span>
                        </x-ui.button-only>
                        <x-ui.button-only size="sm" class="w-full" type="button" variant="danger"
                            data-modal-hide="confirm-dialog-modal" x-show="type == 'danger'"
                            x-on:click.prevent="$dispatch(target);target='';">
                            <span x-text="labelOk"></span>
                        </x-ui.button-only>
                        <x-ui.button-only size="sm" class="w-full" type="button" variant="info"
                            data-modal-hide="confirm-dialog-modal" x-show="type == 'info'"
                            x-on:click.prevent="$dispatch(target);target='';">
                            <span x-text="labelOk"></span>
                        </x-ui.button-only>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Confirm Drawer -->
<div id="confirm-dialog-drawer" data-drawer-backdrop="true" class="top-0 left-0 transition-transform -translate-x-full"
    x-bind:class="{
        'fixed top-0 left-0 right-0 z-40 w-full p-4 transition-transform -translate-y-full bg-white dark:bg-gray-800': placement ==
            'top',
        'fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800': placement ==
            'right',
        'fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800': placement ==
            'left',
        'fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none': placement ==
            'bottom',
        'border-t-4 border-warning-500 dark:border-warning-400': type == 'warning',
        'border-t-4 border-success-500 dark:border-success-400': type == 'success',
        'border-t-4 border-danger-700 dark:border-danger-600': type == 'danger',
        'border-t-4 border-info-500 dark:border-info-400': type == 'info',
    }"
    tabindex="-1" aria-labelledby="drawer-label">
    <!-- Header -->
    <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold tracking-widest uppercase"
        x-bind:class="{
            'text-warning-500 dark:text-warning-400': type == 'warning',
            'text-success-500 dark:text-success-400': type == 'success',
            'text-danger-700 dark:text-danger-600': type == 'danger',
            'text-info-500 dark:text-info-400': type == 'info',
        }"
        x-text="headTitle" x-show="headTitle != ''">
    </h5>
    <button type="button" data-drawer-hide="confirm-dialog-drawer"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <!-- Body -->
    <div x-bind:class="{ 'md:min-h-[92vh]': placement == 'left' || placement == 'right' }">
        <span x-show="useIcon">
            <x-tabler-alert-square-rounded class="w-12 h-12 mx-auto mb-4 text-warning-500 dark:text-warning-400"
                aria-hidden="true" x-show="type == 'warning'" />
            <x-tabler-square-rounded-check class="w-12 h-12 mx-auto mb-4 text-success-500 dark:text-success-400"
                aria-hidden="true" x-show="type == 'success'" />
            <x-tabler-square-rounded-x class="w-12 h-12 mx-auto mb-4 text-danger-700 dark:text-danger-600"
                aria-hidden="true" x-show="type == 'danger'" />
            <x-tabler-info-square-rounded class="w-12 h-12 mx-auto mb-4 text-info-500 dark:text-info-400"
                aria-hidden="true" x-show="type == 'info'" />
        </span>
        <div class="flex-row items-center mb-5 text-center gap-y-2">
            <h3 class="text-lg font-normal"
                x-bind:class="{
                    'text-warning-500 dark:text-warning-400': type == 'warning',
                    'text-success-500 dark:text-success-400': type == 'success',
                    'text-danger-700 dark:text-danger-600': type == 'danger',
                    'text-info-500 dark:text-info-400': type == 'info',
                }"
                x-text="title" x-show="title != ''"></h3>
            <p class="text-gray-500 dark:text-gray-400" x-text="message" x-show="message != ''"></p>
        </div>
    </div>
    <!-- Footer -->
    <div class="flex items-center justify-center gap-x-3">
        <span x-show="useCancel" class="w-full">
            <x-ui.button-only size="sm" class="w-full" type="button" variant="light"
                data-drawer-hide="confirm-dialog-drawer">
                <span class="truncate" x-text="labelCancel"></span>
            </x-ui.button-only>
        </span>
        <span x-show="useOk" class="w-full">
            <x-ui.button-only size="sm" class="w-full" type="button" variant="warning"
                data-modal-hide="confirm-dialog-modal" x-show="type == 'warning'"
                x-on:click.prevent="$dispatch(target);target='';">
                <span class="truncate" x-text="labelOk"></span>
            </x-ui.button-only>
            <x-ui.button-only size="sm" class="w-full" type="button" variant="success"
                data-modal-hide="confirm-dialog-modal" x-show="type == 'success'"
                x-on:click.prevent="$dispatch(target);target='';">
                <span class="truncate"x-text="labelOk"></span>
            </x-ui.button-only>
            <x-ui.button-only size="sm" class="w-full" type="button" variant="danger"
                data-modal-hide="confirm-dialog-modal" x-show="type == 'danger'"
                x-on:click.prevent="$dispatch(target);target='';">
                <span class="truncate" x-text="labelOk"></span>
            </x-ui.button-only>
            <x-ui.button-only size="sm" class="w-full" type="button" variant="info"
                data-drawer-hide="confirm-dialog-drawer" x-show="type == 'info'"
                x-on:click.prevent="$dispatch(target);target='';">
                <span class="truncate" x-text="labelOk"></span>
            </x-ui.button-only>
        </span>
    </div>
</div>
