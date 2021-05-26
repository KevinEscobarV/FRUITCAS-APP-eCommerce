<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RolesTable extends Component
{

    use WithPagination;
    protected $queryString =['search' => ['except' => '']];

    public $search = '';
    public $perPage = '10';


    public function render()
    {
        return view('livewire.roles-table',  ['roles' => Role::where('name', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)]);
    }
}
