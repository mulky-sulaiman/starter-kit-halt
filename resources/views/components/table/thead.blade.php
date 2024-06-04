@props(['columns'])

<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    @if (isset($columns) && is_array($columns))
        @foreach ($columns as $column)
            <x-table.th field="{{ $column }}" />
        @endforeach
    @endif
    {{ $slot }}
</thead>
