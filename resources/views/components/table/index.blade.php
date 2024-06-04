@props(['columns', 'records'])

<table
    {{ $attributes->merge(['id' => 'table', 'class' => 'w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400']) }}>

    @if (isset($columns))
        <x-table.thead :columns="$columns" />
        @if (isset($records))
            <x-table.tbody :columns="$columns" :records="$records" />
        @endif
    @endif

    {{ $slot }}

</table>
