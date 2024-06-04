@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'type' => 'text',
    'prefix' => null,
    'suffix' => null,
    'hint' => null,
    'success' => null,
])

@php
    // $wireModel = $attributes->get('wire:model');
    $required = $attributes->get('required') ? true : false;
    $disabled = $attributes->get('disabled') ? true : false;
    $readonly = $attributes->get('readonly') ? true : false;
    $autofocus = $attributes->get('autofocus') ? true : false;
    $isSuccess = $success != null ? true : false;
@endphp

{{-- @if ($type == 'password')
    <div x-data="{ showPassword: false }">
        @if ($label)
            <!-- Label -->
            <label for="{{ $id ?? '' }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error($wireModel) !text-danger-700 dark:!text-danger-500 @enderror {{ $isSuccess ? '!text-success-700 dark:!text-success-500' : '' }} {{ $required ? 'required' : '' }}">
                {{ $label }}
            </label>
        @endif
        <!-- Input Block -->
        <div class="relative">
            <div class="relative">
                @if ($prefix)
                    <!-- Prefix -->
                    <div class="absolute inset-y-0 flex items-center start-0 ps-3">
                        {{ $prefix }}
                    </div>
                @endif
                <!-- Main -->
                <div data-model="{{ $wireModel }}">
                    <input id="{{ $id ?? '' }}" name="{{ $name ?? '' }}"
                        x-bind:type="showPassword ? 'text' : 'password'" placeholder="••••••••"
                        class="{{ $disabled || $readonly ? 'cursor-not-allowed' : '' }} {{ $prefix ? 'ps-10' : '' }} {{ $suffix ? 'pe-10' : '' }} block w-full p-2.5 rounded-lg text-sm border  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:!bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error($wireModel)  !text-danger-900 !placeholder-danger-700  !border-danger-500  !bg-danger-50 focus:!ring-danger-500 dark:!bg-gray-700 focus:!border-danger-500 dark:!text-danger-500 dark:!placeholder-danger-500 dark:!border-danger-500 @enderror {{ $isSuccess ? '!text-success-900 !placeholder-success-700  !border-success-500  !bg-success-50 focus:!ring-success-500 dark:!bg-gray-700 focus:!border-success-500 dark:!text-success-500 dark:!placeholder-success-500 dark:!border-success-500' : '' }}"
                        {{ $attributes->whereStartsWith('wire:model') }} {{ $attributes }}
                        {{ $autofocus ? 'autofocus' : '' }} {{ $required ? 'required' : '' }}
                        wire:dirty.class="text-warning-900 placeholder-warning-700  border-warning-500  bg-warning-50 focus:!ring-warning-500 dark:bg-gray-700 focus:!border-warning-500 dark:text-warning-500 dark:placeholder-warning-500 dark:border-warning-500" />
                </div>
                <!-- Suffix -->
                <div class="absolute inset-y-0 flex items-center end-0 pe-3">
                    <div class="flex items-center justify-center">
                        <a href="#" role="button" data-tooltip-target="tooltip-password-{{ $id }}"
                            title="{{ __('global.password_tooltip') }}"
                            x-on:click.prevent="showPassword = !showPassword">
                            <x-tabler-eye class="w-6 h-6 text-gray-400 hover:text-gray-500 focus:text-gray-500"
                                x-show="!showPassword" />
                            <x-tabler-eye-off class="w-6 h-6 text-gray-400 hover:text-gray-500 focus:text-gray-500"
                                x-show="showPassword" />
                        </a>
                        <div id="tooltip-password-{{ $id }}" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('global.password_tooltip') }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        @if (!$errors->has($id))
                            <x-tabler-alert-triangle class="w-6 h-6 ml-3 text-warning-500 dark:text-warning-500"
                                wire:dirty wire:target="{{ $wireModel }}" />
                        @endif
                        @error($wireModel)
                            <x-tabler-x class="w-6 h-6 ml-3 text-danger-700 dark:text-danger-500" />
                        @enderror
                        @if ($isSuccess)
                            <x-tabler-check class="w-6 h-6 ml-3 text-success-700 dark:text-success-500" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @error($wireModel)
            <!-- Validation Message -->
            <p id="{{ $id }}-error" class="mt-2 text-sm text-justify text-danger-600 dark:text-danger-500">
                {{ $message }}
            </p>
        @enderror
        @if ($isSuccess)
            <!-- Validation Message -->
            <p :id="id + '-success'" class="mt-2 text-sm text-justify text-success-600 dark:text-success-500">
                {{ $success }}
            </p>
        @endif
        @if ($hint)
            <!-- Hint -->
            <div id="{{ $id }}-hint" class="mt-2 text-sm text-justify text-gray-500 dark:text-gray-400">
                {!! $hint !!}
            </div>
        @endif
    </div>
@else
    <div>
        @if ($label)
            <!-- Label -->
            <label for="{{ $id ?? '' }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error($wireModel) !text-danger-700 dark:!text-danger-500 @enderror {{ $isSuccess ? '!text-success-700 dark:!text-success-500' : '' }} {{ $required ? 'required' : '' }}">
                {{ $label }}
            </label>
        @endif
        <!-- Input Block -->
        <div class="relative">
            <div class="relative">
                @if ($prefix)
                    <!-- Prefix -->
                    <div class="absolute inset-y-0 flex items-center start-0 ps-3">
                        {{ $prefix }}
                    </div>
                @endif
                <!-- Main -->
                <div data-model="{{ $wireModel }}">
                    <input id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" type="{{ $type ?? '' }}"
                        class="{{ $disabled || $readonly ? 'cursor-not-allowed' : '' }} {{ $prefix ? 'ps-10' : '' }} {{ $suffix ? 'pe-10' : '' }} block w-full p-2.5 rounded-lg text-sm border  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:!bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error($wireModel)  !text-danger-900 !placeholder-danger-700  !border-danger-500  !bg-danger-50 focus:!ring-danger-500 dark:!bg-gray-700 focus:!border-danger-500 dark:!text-danger-500 dark:!placeholder-danger-500 dark:!border-danger-500 @enderror {{ $isSuccess ? '!text-success-900 !placeholder-success-700  !border-success-500  !bg-success-50 focus:!ring-success-500 dark:!bg-gray-700 focus:!border-success-500 dark:!text-success-500 dark:!placeholder-success-500 dark:!border-success-500' : '' }}"
                        {{ $attributes->whereStartsWith('wire:model') }} {{ $attributes }}
                        {{ $autofocus ? 'autofocus' : '' }} {{ $required ? 'required' : '' }}
                        wire:dirty.class="text-warning-900 placeholder-warning-700  border-warning-500  bg-warning-50 focus:!ring-warning-500 dark:bg-gray-700 focus:!border-warning-500 dark:text-warning-500 dark:placeholder-warning-500 dark:border-warning-500" />
                </div>
                @if ($suffix && !$errors->has($id))
                    <!-- Suffix -->
                    <div class="absolute inset-y-0 flex items-center end-0 pe-3">
                        {{ $suffix }}
                    </div>
                @endif
                @if (!$suffix && !$errors->has($id))
                    <!-- Dirty Suffix -->
                    <div wire:dirty wire:target="{{ $wireModel }}"
                        class="absolute inset-y-0 flex items-center justify-center pt-2 end-0 pe-3">
                        <x-tabler-alert-triangle class="w-6 h-6 text-warning-500 dark:text-warning-500" />
                    </div>
                @endif
                @if ($isSuccess)
                    <!-- Success Suffix -->
                    <div class="absolute inset-y-0 flex items-center justify-center pt-2 end-0 pe-3">
                        <x-tabler-check class="w-6 h-6 text-success-500 dark:text-success-500" />
                    </div>
                @endif
                @error($wireModel)
                    <!-- Error Suffix -->
                    <div class="absolute inset-y-0 flex items-center end-0 pe-3">
                        <x-tabler-x class="w-6 h-6 text-danger-700 dark:text-danger-500" />
                    </div>
                @enderror
            </div>

        </div>
        @error($wireModel)
            <!-- Validation Message -->
            <p id="{{ $id }}-error" class="mt-2 text-sm text-justify text-danger-600 dark:text-danger-500">
                {{ $message }}
            </p>
        @enderror
        @if ($isSuccess)
            <!-- Validation Message -->
            <p :id="id + '-success'" class="mt-2 text-sm text-justify text-success-600 dark:text-success-500">
                {{ $success }}
            </p>
        @endif
        @if ($hint)
            <!-- Hint -->
            <div id="{{ $id }}-hint" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {!! $hint !!}
            </div>
        @endif
    </div>
@endif --}}

@if ($type == 'password')
    <div x-data="{ showPassword: false, dirty: false, success: @if ($isSuccess) true, @else false, @endif required: @if ($required) true, @else false, @endif error: @error($id) true @else false @enderror }" class="mb-4">
        @if ($label)
            <label for={{ $id }} class="label"
                x-bind:class="{ 'label-is-dirty': dirty, 'label-is-invalid': error, 'label-is-valid': success, 'required': required }">
                {{ $label }}
            </label>
        @endif
        <div class="relative">
            <input id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" type="password"
                class="input @if ($isSuccess) is-valid @endif @error($id) is-invalid @enderror @if ($disabled || $readonly) cursor-not-allowed' @endif}}"
                x-on:keydown="dirty=true; error=false; success=false;" x-bind:type="showPassword ? 'text' : 'password'"
                placeholder="••••••••" x-bind:class="{ 'is-dirty': dirty, 'is-invalid': error, 'is-valid': success }"
                {{ $attributes }} {{ $autofocus ? 'autofocus' : '' }} {{ $required ? 'required' : '' }}>
            <div class="absolute inset-y-0 flex items-center end-0 pe-3">
                <div class="flex items-center justify-center">
                    <a href="#" role="button" data-tooltip-target="tooltip-password"
                        title="{{ __('global.password_tooltip') }}" x-on:click.prevent="showPassword = !showPassword">
                        <x-tabler-eye class="w-6 h-6 text-gray-400 hover:text-gray-500 focus:text-gray-500"
                            x-show="!showPassword" />
                        <x-tabler-eye-off class="w-6 h-6 text-gray-400 hover:text-gray-500 focus:text-gray-500"
                            x-show="showPassword" />
                    </a>
                    <div id="tooltip-password" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        {{ __('global.password_tooltip') }}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <x-tabler-alert-triangle class="w-6 h-6 ms-3 text-warning-500 dark:text-warning-500"
                        x-show="dirty" />
                    <x-tabler-x class="w-6 h-6 ms-3 text-danger-500 dark:text-danger-500" x-show="error" />
                    <x-tabler-check class="w-6 h-6 ms-3 text-success-500 dark:text-success-500" x-show="success" />
                </div>
            </div>
        </div>
        <p class="mt-2 text-sm text-warning-600 dark:text-warning-500" x-show="dirty">
            {{ __('auth.dirty_message') }}
        </p>
        <div class="mt-2 text-sm text-danger-600 dark:text-danger-500" x-show="error">
            <ul>
                @foreach ((array) $errors->get($id) as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @if ($success)
            <p class="mt-2 text-sm text-success-600 dark:text-success-500" x-show="success">
                {{ $success }}
            </p>
        @endif
        @if ($hint)
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {!! $hint !!}
            </p>
        @endif
    </div>
@else
    <div x-data="{ dirty: false, success: @if ($isSuccess) true, @else false, @endif required: @if ($required) true, @else false, @endif error: @error($id) true @else false @enderror }" class="mb-4">
        @if ($label)
            <label for={{ $id }} class="label"
                x-bind:class="{ 'label-is-dirty': dirty, 'label-is-invalid': error, 'label-is-valid': success, 'required': required }">
                {{ $label }}
            </label>
        @endif
        <div class="relative">
            <input id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" type="{{ $type ?? '' }}"
                class="input @if ($isSuccess) is-valid @endif @error($id) is-invalid @enderror @if ($disabled || $readonly) cursor-not-allowed' @endif}}"
                x-on:keydown="dirty=true; error=false; success=false;"
                x-bind:class="{ 'is-dirty': dirty, 'is-invalid': error, 'is-valid': success }" {{ $attributes }}
                {{ $autofocus ? 'autofocus' : '' }} {{ $required ? 'required' : '' }}>
            <div class="absolute inset-y-0 flex items-center end-0 pe-3">
                <x-tabler-alert-triangle class="w-6 h-6 text-warning-500 dark:text-warning-500" x-show="dirty" />
                <x-tabler-x class="w-6 h-6 text-danger-500 dark:text-danger-500" x-show="error" />
                <x-tabler-check class="w-6 h-6 text-success-500 dark:text-success-500" x-show="success" />
            </div>
        </div>
        <p class="mt-2 text-sm text-warning-600 dark:text-warning-500" x-show="dirty">
            {{ __('auth.dirty_message') }}
        </p>
        <div class="mt-2 text-sm text-danger-600 dark:text-danger-500" x-show="error">
            <ul>
                @foreach ((array) $errors->get($id) as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @if ($success)
            <p class="mt-2 text-sm text-success-600 dark:text-success-500" x-show="success">
                {{ $success }}
            </p>
        @endif
        @if ($hint)
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {!! $hint !!}
            </p>
        @endif
    </div>
@endif
