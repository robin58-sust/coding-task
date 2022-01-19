<div class="mt-8">
    <div class="text-2xl">
        <div>Categories</div> 
    </div>

    <div class="mt-6">
        <div class="flex justify-end">
            <x:tall-crud-generator::button mode="add" wire:click="$emitTo('categories-child', 'showCreateForm');">Create New</x:tall-crud-generator::button>
        </div>
        <x:tall-crud-generator::table class="mt-4">
            <x-slot name="header">
                <x:tall-crud-generator::table-column>
                    <div class="flex items-center">
                        <button wire:click="sortBy('id')">Id</button>
                        <x:tall-crud-generator::sort-icon sortField="id" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Ranking</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Name-eng</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Name-Ban</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Status</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Image</x:tall-crud-generator::table-column>
                <x:tall-crud-generator::table-column>Actions</x:tall-crud-generator::table-column>
            </x-slot>
            @foreach($results as $result)
                <tr class="hover:bg-gray-300">
                    <x:tall-crud-generator::table-column>{{ $result->id}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->ranking}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->name_en}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->name_bn}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->is_active}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>{{ $result->web_image}}</x:tall-crud-generator::table-column>
                    <x:tall-crud-generator::table-column>
                        <x:tall-crud-generator::button mode="edit" wire:click="$emitTo('categories-child', 'showEditForm',  {{ $result->id}});">Edit</x:tall-crud-generator::button>
                        <x:tall-crud-generator::button mode="delete" wire:click="$emitTo('categories-child', 'showDeleteForm',  {{ $result->id}});">Delete</x:tall-crud-generator::button>
                    </x:tall-crud-generator::table-column>
               </tr>
            @endforeach
        </x:tall-crud-generator::table>
    </div>

    <div class="mt-4">
        {{ $results->links() }}
    </div>
    @livewire('categories-child')
</div>