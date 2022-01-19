<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.ranking' => 'required|numeric',
        'item.name_en' => 'required',
        'item.name_bn' => 'required',
        'item.is_active' => 'required',
        'item.web_image' => 'required',
    ];

    protected $validationAttributes = [
        'item.ranking' => 'Ranking',
        'item.name_en' => 'Name-eng',
        'item.name_bn' => 'Name-Ban',
        'item.is_active' => 'Status',
        'item.web_image' => 'Image',
    ];

    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;

    public function render()
    {
        return view('livewire.categories-child');
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Category::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->emitTo('categories', 'refresh');
        $this->emitTo('notifier','message',['text'=>__('The category is deleted!')]);

    }

    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        Category::create([
            'ranking' => $this->item['ranking'],
            'name_en' => $this->item['name_en'],
            'name_bn' => $this->item['name_bn'],
            'is_active' => $this->item['is_active'],
            'web_image' => $this->item['web_image'],
        ]);
        $this->confirmingItemCreation = false;
        $this->emitTo('categories', 'refresh');
        $this->emitTo('notifier','message',['text'=>__('The category is saved!')]);

    }

    public function showEditForm(Category $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->emitTo('categories', 'refresh');
    }

}
