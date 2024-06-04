@props(['title' => 'Default Card Title', 'footer' => ''])

<div x-data="{
    showCard: true,
    showPanel: true,
    fullScreen: false,
    toggleCard() { this.showCard = !this.showCard },
    togglePanel() { this.showPanel = !this.showPanel },
    toggleFullScreen() { this.fullScreen = !this.fullScreen },
    // showPane() { this.showPanel = true },
    // refreshPanel() {
    //     this.showPanel = false;
    //     $nextTick(() => { setTimeout(function() { this.showPanel = true }, 500) });
    // }),
}">

    <div x-show="showCard" x-transition
        {{ $attributes->merge(['class' => 'w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 text-gray-800 dark:text-white']) }}
        x-bind:class="{ 'fixed top-0 left-0 z-50 min-w-full min-h-full': fullScreen, '': !fullScreen }">
        <!--Head-->
        <div class="flex justify-between p-4">
            <!--Left-->
            <div class="flex">
                <h1 class="text-2xl font-semibold">{{ $title }}</h1>
            </div>
            <!--Right-->
            <div class="flex">
                <!-- Card Hint -->
                <div
                    class="cursor-help inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5">
                    <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-5 h-5"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                    </svg>
                    <div data-popover id="chart-info" role="tooltip"
                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth
                                -
                                Incremental
                            </h3>
                            <p>Report helps navigate cumulative growth of community activities.
                                Ideally,
                                the
                                chart
                                should have a growing trend, as stagnating chart signifies a
                                significant
                                decrease of
                                community activity.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                            <p>For each date bucket, the all-time volume of activities is
                                calculated.
                                This
                                means
                                that activities in period n contain all activities up to period n,
                                plus
                                the
                                activities generated by your community in period.</p>
                            <a href="#"
                                class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg></a>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
                <!--Card Menu -->
                <div>
                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <x-tabler-dots-vertical class="w-5 h-5" />
                    </button>
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <p
                                    class="flex px-4 py-2 text-xs text-gray-700 uppercase dark:text-gray-200 dark:hover:text-white">
                                    Card Settings</p>
                            </li>
                            <li>
                                <a href="#" @click.prevent="togglePanel()"
                                    class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <x-tabler-arrow-up class="w-5 h-5 mr-2" x-show="showPanel" />
                                    <x-tabler-arrow-down class="w-5 h-5 mr-2" x-show="!showPanel" />
                                    <span x-text="showPanel ? 'Hide Panel' : 'Show Panel'"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="toggleFullScreen()"
                                    class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <x-tabler-arrows-maximize class="w-5 h-5 mr-2" x-show="!fullScreen" />
                                    <x-tabler-arrows-minimize class="w-5 h-5 mr-2" x-show="fullScreen" />
                                    <span x-text="fullScreen ? 'Minimize Card' : 'Maximize Card'"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    @click.prevent="showPanel = false;$nextTick(() => { setTimeout(function() { showPanel = true }, 500) });"
                                    class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <x-tabler-refresh class="w-5 h-5 mr-2" />
                                    <span>Refresh Card</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" @click.prevent="toggleCard()"
                                    class="flex px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <x-tabler-x class="w-5 h-5 mr-2" />
                                    Remove Card
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Panel -->
        <div x-show="showPanel" x-transition>
            <!--Body-->
            <div class="flex flex-col items-center">
                {{ $slot }}
            </div>
            @if ($footer && !empty($footer))
                <!-- Footer -->
                <div class="flex justify-between p-4">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
