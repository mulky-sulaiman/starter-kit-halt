<div data-dial-init class="fixed flex end-6 bottom-6 group">
    <div id="speed-dial-menu-horizontal" class="flex items-center hidden space-x-2 me-4 rtl:space-x-reverse">
        <!-- Language Switcher -->
        <livewire:language-switcher />
        <!-- Screen Switcher -->
        <x-ui.screen-switcher />
        <!-- Theme Switcher -->
        <x-ui.theme-switcher />
        <!-- Back to Top -->
        <x-ui.back-to-top />
    </div>
    <button type="button" data-dial-toggle="speed-dial-menu-horizontal" aria-controls="speed-dial-menu-horizontal"
        aria-expanded="false"
        class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-primary-700 animate-pulse hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 focus:outline-none dark:focus:ring-primary-800">
        <svg class="w-7 h-7 transition-transform group-hover:rotate-[180deg]" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg>
        <span class="sr-only">{{ __('speed-dial.open-actions-menu') }}</span>
    </button>
</div>
