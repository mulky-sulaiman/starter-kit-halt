<x-default-layout :title="__('passwords.confirm_password_title')">

    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <h1 class="text-xl font-bold leading-tight tracking-tight text-danger-700 md:text-2xl dark:text-danger-600">
            {{ __('passwords.confirm_password_title') }}
        </h1>

        <div class="mb-4 text-base font-normal text-justify text-gray-500 dark:text-gray-400">
            {{ __('passwords.confirm_password_sub_title') }}
        </div>

        <div class="flex items-center justify-center">
            <div class="">
                <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                    src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7F9CF5&background=EBF4FF'"
                    alt="{{ auth()->user()->name }}">
                <div class="w-full mx-auto mt-4 text-center">
                    <p class="text-lg font-medium text-gray-900 font-base dark:text-white">{{ auth()->user()->name }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-200">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4 md:space-y-6">
            @csrf

            <!-- Password -->
            <x-forms.input :label="__('login.password')" :hint="__('login.password_hint')" type="password" id="password" name="password"
                wire:model="password" autofocus required x-ref="password" />
            <!-- Forgot Password Link-->
            <div class="flex items-center justify-between">
                <x-ui.text-link class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500"
                    href="{{ route('password.request') }}">{{ __('login.forgot_password') }}</x-ui.text-link>
            </div>
            <!-- Consent ToS & PP -->
            <x-ui.tos-consent wire:model.checked="terms" required />
            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" variant="danger" class="w-full"
                x-bind:disabled="!show" x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-lock-open class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span class="truncate">{{ __('passwords.confirm_password') }}</span>
                </div>
            </x-ui.button-only>

            <!-- Password -->
            {{-- <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Confirm') }}
                </x-primary-button>
            </div> --}}
        </form>
    </x-ui.authentication-card>
</x-default-layout>
