<div>

    <x:tall-crud-generator::confirmation-dialog wire:model="confirmingItemDeletion">
        <x-slot name="title">
            Delete Record
        </x-slot>

        <x-slot name="content">
            Are you sure you want to Delete Record?
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemDeletion', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="delete" wire:click="deleteItem()">Delete</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::confirmation-dialog>

    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemCreation">
        <x-slot name="title">
            Add Record
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x:tall-crud-generator::label>Ranking</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.ranking" />
                @error('item.ranking') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name-eng</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name_en" />
                @error('item.name_en') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name-Ban</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name_bn" />
                @error('item.name_bn') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Status</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.is_active"><option value="1">Active</option><option value="0">Inactive</option>
                </x:tall-crud-generator::select> 
                @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Image</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.web_image" />
                @error('item.web_image') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemCreation', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:click="createItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>

    <x:tall-crud-generator::dialog-modal wire:model="confirmingItemEdition">
        <x-slot name="title">
            Edit Record
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x:tall-crud-generator::label>Ranking</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.ranking" />
                @error('item.ranking') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name-eng</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name_en" />
                @error('item.name_en') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Name-Ban</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.name_bn" />
                @error('item.name_bn') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Status</x:tall-crud-generator::label>
                <x:tall-crud-generator::select class="block mt-1 w-1/4" wire:model.defer="item.is_active"><option value="1">Active</option><option value="0">Inactive</option>
                </x:tall-crud-generator::select> 
                @error('item.is_active') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
            <div class="mt-4">
                <x:tall-crud-generator::label>Image</x:tall-crud-generator::label>
                <x:tall-crud-generator::input class="block mt-1 w-1/2" type="text" wire:model.defer="item.web_image" />
                @error('item.web_image') <x:tall-crud-generator::error-message>{{$message}}</x:tall-crud-generator::error-message> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x:tall-crud-generator::button wire:click="$set('confirmingItemEdition', false)">Cancel</x:tall-crud-generator::button>
            <x:tall-crud-generator::button mode="add" wire:click="editItem()">Save</x:tall-crud-generator::button>
        </x-slot>
    </x:tall-crud-generator::dialog-modal>
</div>
