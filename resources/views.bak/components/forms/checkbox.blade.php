@props([
    'label' => null,
    'name' => null,
    'id' => null,
])

<div class="flex items-center">
    <input type="checkbox" {{ $attributes }} id="{{ $id ?? '' }}" name="{{ $name ?? '' }}"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="{{ $id ?? '' }}" class="ml-3 text-sm font-medium text-gray-900 cursor-pointer dark:text-white">
        {{ $label ?? $slot }}
    </label>
</div>
