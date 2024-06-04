    <!-- User Menu Dropdown Trigger -->
    <button type="button"
        class="flex flex-shrink-0 mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="userMenuDropdownButton" aria-expanded="false" data-dropdown-toggle="userMenuDropdown">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full"
            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7F9CF5&background=EBF4FF'"
            alt="user photo">
    </button>
    <!-- User Menu Dropdown Content -->
    <div class="z-50 hidden w-56 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="userMenuDropdown"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1638px, 58px);"
        data-popper-placement="bottom">
        <div class="px-4 py-3">
            <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
            <span
                class="block text-sm font-light text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
        </div>

        <!-- Account Settings -->
        <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="userMenuDropdownButton">
            <li>
                <p class="block px-4 py-2 text-xs font-light text-gray-500 uppercase truncate dark:text-gray-400">
                    Account Settings
                </p>
            </li>
            <li>
                <x-ui.link :href="route('profile.edit')"
                    class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <x-tabler-user-cog class="w-5 h-5 mr-2 text-gray-400" />
                    Profile
                </x-ui.link>
            </li>
        </ul>
        <!-- Logout -->
        <ul class="py-1 font-light text-danger-700 dark:text-danger-600" aria-labelledby="dropdown">
            <li>
                {{-- <a href="#" @click.prevent="" role="button" data-modal-target="logout-modal"
                    data-modal-toggle="logout-modal"
                    class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <x-tabler-logout" class="w-5 h-5 mr-2" />
                    Log out
                </a> --}}
                <a href="{{ route('logout') }}" data-modal-target="confirm-dialog-modal"
                    data-modal-toggle="confirm-dialog-modal"
                    x-on:click.prevent="set('warning', 'sm', true, '{{ __('Logout') }}', '{{ __('We are going to log you out') }}', '{{ __('Are you sure you want to log out?') }}', true, '{{ __('No, Cancel') }}', true, '{{ __('Yes, Proceed') }}', '', 'confirmed-logout-01')"
                    x-on:confirmed-logout-01.window="$dispatch('loadComponent', { target: 'auth.logout', arguments: {}})"
                    class="flex items-center px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <x-tabler-logout class="w-5 h-5 mr-2" />
                    Logout
                </a>
            </li>
        </ul>
    </div>
