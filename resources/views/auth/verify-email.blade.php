<x-default-layout :title="__('auth.verify_email')">

    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('auth.verify_email_title') }}
        </h1>

        <div class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
            {{ __('auth.verify_email_sub_title') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-success-600 dark:text-success-400">
                {{ __('auth.verification_link_sent') }}
            </div>
        @endif

        {{-- <div class="flex items-center justify-between mt-4"> --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" class="w-full" x-bind:disabled="!show"
                x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-mail class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span class="truncate">{{ __('auth.resend_verify_email') }}</span>
                </div>
            </x-ui.button-only>

            <div class="flex items-center justify-between mt-4" hx-boost="false" x-data>
                <form method="POST" action="{{ route('logout') }}" x-ref="form">
                    @csrf
                    <x-ui.link :href="route('profile.edit')" hx-boost="true"
                        class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('auth.edit_profile') }}</x-ui.link>
                    <a href="{{ route('logout') }}" data-modal-target="confirm-dialog-modal"
                        data-modal-toggle="confirm-dialog-modal"
                        x-on:click.prevent="set('warning', 'sm', true, '{{ __('Logout') }}', '{{ __('We are going to log you out') }}', '{{ __('Are you sure you want to log out?') }}', true, '{{ __('No, Cancel') }}', true, '{{ __('Yes, Proceed') }}', '', 'confirmed-logout-03')"
                        x-on:confirmed-logout-03.window="$refs.form.submit()"
                        class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ms-2">
                        {{ __('auth.logout') }}
                    </a>
                </form>
            </div>
        </form>

        {{-- <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form> --}}
        {{-- </div> --}}
    </x-ui.authentication-card>
</x-default-layout>
