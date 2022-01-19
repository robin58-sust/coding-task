<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Category;

class Categories extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];

    public $sortBy = 'id';
    public $sortAsc = true;


    public function render()
    {
        $results = $this->query()
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(15);

        return view('livewire.categories', [
            'results' => $results
        ]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Category::query();
    }
}
