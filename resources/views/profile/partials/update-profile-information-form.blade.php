<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <!-- Name -->
            <x-forms.input :label="__('register.name')" :hint="__('register.name_hint')" id="name" name="name" type="text"
                :placeholder="__('register.name_placeholder')" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        </div>

        <div>
            <!-- Email Address -->
            <x-forms.input :label="__('register.email')" :hint="__('register.email_hint')" id="email" name="email" type="email"
                :placeholder="__('register.email_placeholder')" :value="old('email', $user->email)" required autocomplete="username" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <!-- Submit -->
            <x-ui.button-only x-data="{ show: true }" type="submit" size="sm" x-bind:disabled="!show"
                x-bind:class="{ '!cursor-not-allowed !opacity-50': !show }">
                <div class="flex items-center justify-center">
                    <span x-on:htmx:xhr:progress.window="show=false" class="flex me-2">
                        <x-tabler-device-floppy class="w-6 h-6" x-show="show" />
                        <x-ui.spinner size="md" x-show="!show" />
                    </span>
                    <span>{{ __('Save') }}</span>
                </div>
            </x-ui.button-only>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
