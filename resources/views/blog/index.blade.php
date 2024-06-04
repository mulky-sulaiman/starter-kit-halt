<x-main-layout :title="__('Blog List')">

    <div class="items-center justify-center p-12 mx-auto max-w-7xl">
        <div id="section">
            {{--   Placeholder for the views   --}}
        </div>

        <div id="content">

            <div class="flex justify-between p-3">

                <div class="flex">

                    <x-text-input name="q" class="block px-2 py-1" :value="request('q')" placeholder="Search blog..."
                        hx-get="{{ route('blog.index') }}" hx-target="#table-container" hx-replace-url="true"
                        hx-trigger="keyup changed delay:500ms, search" />

                </div>

                <x-ui.link hx-get="{{ route('blog.create') }}" hx-target="#section">
                    {{ __('Create New Post') }}
                </x-ui.link>

            </div>

            @include('blog.partials.table')

        </div>

    </div>
</x-main-layout>
