<tr
    {{ $attributes->merge(['id' => 'row-' . (time() - rand(100, 200)), 'class' => 'odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer']) }}>
    {{ $slot }}
</tr>
