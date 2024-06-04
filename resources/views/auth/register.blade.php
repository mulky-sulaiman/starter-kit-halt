<x-default-layout :title="__('auth.register')">
    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <!-- Session Status -->
        @if (session('status'))
            <x-ui.authentication-status :status="session('status')" />
        @endif

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('register.title') }}
        </h1>
        <form method="POST" :action="route('register')" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Name -->
            <x-forms.input :label="__('register.name')" :hint="__('register.name_hint')" id="name" name="name" type="text"
                :placeholder="__('register.name_placeholder')" :value="old('name')" required autofocus autocomplete="name" />
            <!-- Email Address -->
            <x-forms.input :label="__('register.email')" :hint="__('register.email_hint')" id="email" name="email" type="email"
                :placeholder="__('register.email_placeholder')" :value="old('email')" required autocomplete="username" />
            <!-- Password -->
            <x-forms.input :label="__('register.password')" :hint="__('register.password_hint')" type="password" id="password" name="password" required
                autocomplete="new-password" />
            <!-- Password Confirmation -->
            <x-forms.input :label="__('register.password_confirmation')" :hint="__('register.password_confirmation_hint')" type="password" id="password_confirmation"
                name="password_confirmation" required autocomplete="new-password" />
            <!-- Consent ToS & PP -->
            <x-ui.tos-consent :value="old('terms')" required />
            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" class="w-full" x-bind:disabled="!show"
                x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-user-plus class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span>{{ __('register.register') }}</span>
                </div>
            </x-ui.button-only>
            <!-- Login Link -->
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                {{ __('register.login_prefix') }}
                <x-ui.link :href="route('login')"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                    {{ __('register.login') }}</x-ui.link>
            </p>
        </form>
    </x-ui.authentication-card>
</x-default-layout>
