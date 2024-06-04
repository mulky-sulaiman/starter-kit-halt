<x-ui.link :href="route('home')"
    class="flex items-center mb-6 text-2xl font-semibold tracking-widest text-gray-900 uppercase dark:text-white">
    {{-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo" /> --}}
    <x-ui.application-logo class="w-10 h-10 mr-2" fill="currentColor" />
    {{ __('index.brand') }}
</x-ui.link>
