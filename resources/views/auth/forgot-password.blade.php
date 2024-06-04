<x-default-layout :title="__('auth.forgot_password')">
    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <!-- Session Status -->
        @if (session('status'))
            <x-ui.authentication-status :status="session('status')" />
        @endif

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('passwords.forgot_password_title') }}
        </h1>
        <div class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
            {{ __('passwords.forgot_password_sub_title') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Email -->
            <x-forms.input :label="__('login.email')" :hint="__('login.email_hint')" id="email" name="email" type="email"
                :placeholder="__('login.email_placeholder')" :value="old('email')" autofocus required :success="session('status')" />
            <!-- Consent ToS & PP -->
            <x-ui.tos-consent :value="old('terms')" required />
            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" class="w-full" x-bind:disabled="!show"
                x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-mail class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span class="truncate">{{ __('passwords.email_forgot_password_link') }}</span>
                </div>
            </x-ui.button-only>
        </form>
        <!-- Login Link -->
        <p class="mt-6 text-sm font-light text-gray-500 dark:text-gray-400">
            {{ __('auth.forgot_password_login_prefix') }}
            <x-ui.link :href="route('login')" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                {{ __('auth.forgot_password_login') }}</x-ui.link>
        </p>
    </x-ui.authentication-card>
</x-default-layout>
