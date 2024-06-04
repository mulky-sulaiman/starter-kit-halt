<?php

use function Laravel\Folio\name;
use function Laravel\Folio\{middleware};

name('dashboard');
middleware(['auth', 'verified']);
?>
<x-app-layout :title="__('Dashboard')">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="col-span-full xl:col-auto">
            <x-ui.card class="mb-4 !max-w-full">
                <div class="w-full px-4">
                    <div
                        class="w-full px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded min-h-52 dark:border-gray-600">
                        <h3>Card body</h3>
                    </div>
                </div>
                <x-slot name="footer">
                    <a href="#">left</a>
                    <a href="#">right</a>
                </x-slot>
            </x-ui.card>
            <div
                class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card header</h3>
                </div>
                <div
                    class="h-32 px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card body</h3>
                </div>
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card footer</h3>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div
                class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card header</h3>
                </div>
                <div
                    class="h-32 px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card body</h3>
                </div>
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card footer</h3>
                </div>
            </div>
            <div
                class="p-4 mb-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card header</h3>
                </div>
                <div
                    class="h-32 px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card body</h3>
                </div>
                <div class="px-4 py-2 text-gray-400 border border-gray-200 border-dashed rounded dark:border-gray-600">
                    <h3>Card footer</h3>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
