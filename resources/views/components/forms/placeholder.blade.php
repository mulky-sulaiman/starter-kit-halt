@props(['label', 'title', 'required'])
<x-forms.label {{ $attributes->merge(['class' => 'text-xs tracking-widest !text-gray-600 uppercase']) }}>
    {{ $label }}
</x-forms.label>
<p class="text-gray-900 dark:text-white">{{ $title }}</p>
