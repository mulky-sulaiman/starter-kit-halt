<x-default-layout :title="__('passwords.reset_password')">

    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            {{ __('passwords.reset_password_title') }}
        </h1>

        <div class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
            {{ __('passwords.reset_password_sub_title') }}
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4 md:space-y-6" x-data
            x-init="$refs.password.focus()">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}" />

            <!-- Email Address -->
            <x-forms.input :label="__('login.email')" :hint="__('login.email_hint')" id="email" name="email" type="email"
                :placeholder="__('login.email_placeholder')" :value="old('email', $request->email)" required autocomplete="username" />
            <!-- Password -->
            <x-forms.input :label="__('register.password')" :hint="__('register.password_hint')" type="password" id="password" name="password"
                name="password" required autocomplete="new-password" autofocus x-ref="password" />
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
                        <x-tabler-lock-cog class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span class="truncate">{{ __('passwords.reset_password') }}</span>
                </div>
            </x-ui.button-only>

            <!-- Email Address -->
            {{-- <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}

            <!-- Password -->
            {{-- <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> --}}

            <!-- Confirm Password -->
            {{-- <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div> --}}

            {{-- <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div> --}}
        </form>
    </x-ui.authentication-card>
</x-default-layout>
