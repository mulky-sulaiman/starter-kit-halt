<div class="flex items-center justify-between">
    <x-forms.checkbox id="terms" name="terms" {{ $attributes }}>
        <span>{{ __('register.agree_to_the') }}
            <x-ui.text-link
                class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">{{ __('register.tos') }}</x-ui.text-link>
            {{ __('register.and') }}
            <x-ui.text-link
                class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">{{ __('register.privacy_policy') }}</x-ui.text-link>
        </span>
    </x-forms.checkbox>
</div>
