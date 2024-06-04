<!-- Back to Top Trigger -->
<button x-data="{
    backToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' })
    }
}" @click="backToTop()" type="button" data-tooltip-target="tooltip-back-to-top"
    data-tooltip-placement="top"
    class="inline-flex justify-center p-2 text-gray-500 bg-white border border-gray-200 rounded-full shadow-sm hover:text-gray-900 dark:border-gray-600 dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
    <svg class="w-5 h-5 animate-bounce" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 6v13m0-13 4 4m-4-4-4 4" />
    </svg>
    <span class="sr-only">{{ __('speed-dial.back-to-top') }}</span>
</button>
<!-- Back to Top Tooltip -->
<div id="tooltip-back-to-top" role="tooltip"
    class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    {{ __('speed-dial.back-to-top') }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
