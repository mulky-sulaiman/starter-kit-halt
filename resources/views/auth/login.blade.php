<x-default-layout :title="__('auth.login')">
    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <!-- Session Status -->
        @if (session('status'))
            <x-ui.authentication-status :status="session('status')" />
        @endif

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('login.title') }}
        </h1>

        <form method="POST" :action="route('login')" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Email Address -->
            <x-forms.input :label="__('login.email')" :hint="__('login.email_hint')" id="email" name="email" type="email"
                :placeholder="__('login.email_placeholder')" :value="old('email')" autofocus required autocomplete="username" />

            <!-- Password -->
            <x-forms.input :label="__('login.password')" :hint="__('login.password_hint')" id="password" name="password" type="password" required
                autocomplete="current-password" />

            <!-- Remember Me - Forgot Password Link-->
            <div class="flex items-center justify-between">
                <x-forms.checkbox :label="__('login.remember_me')" id="remember" name="remember" />
                @if (Route::has('password.request'))
                    <x-ui.text-link class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500"
                        href="{{ route('password.request') }}">{{ __('login.forgot_password') }}</x-ui.text-link>
                @endif
            </div>

            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" class="w-full" x-bind:disabled="!show"
                x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-login-2 class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span>{{ __('login.login') }}</span>
                </div>
            </x-ui.button-only>

            <!-- Register Link -->
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                {{ __('login.register_prefix') }}
                <x-ui.link :href="route('register')" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                    {{ __('login.register') }}</x-ui.link>
            </p>
        </form>
    </x-ui.authentication-card>
</x-default-layout>
