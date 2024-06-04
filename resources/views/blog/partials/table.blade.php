<div id="table-container" hx-get="{{ route('blog.index') }}" hx-trigger="loadContacts from:body">

    <x-table :columns="['author', 'title', 'excerpt', 'type', 'actions']">
        <x-table.tbody :columns="['user.name', 'title', 'excerpt', 'type', 'actions']" :records="$posts">

            {{--            <?php  $__env->slot('actions', function($record) use ($__env) { ?> --}}
            {{--                <x-table.actions.view :record="$record"/> --}}
            {{--                <x-table.actions.edit :record="$record"/> --}}
            {{--            <?php }); ?> --}}

        </x-table.tbody>
    </x-table>

    <div id="pagination-links" class="p-3" hx-boost="true" hx-target="#table-container">
        {{ $blog->links() }}
    </div>

</div>
