<?php

namespace App\Http\Livewire\Admin;

use App\Models\Fruit;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Livewire\Component;

class FruitController extends Component
{

    public $fruits, $fruit, $total, $unidades, $totalprice = 0, $suma = 0, $fecha, $search = "0";

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null,
        'description' => null,
        'price' => null,
        'quantity' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null,
        'description' => null,
        'price' => null,
        'quantity' => null
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.description' => 'required',
        'createForm.price' => 'required',
        'createForm.quantity' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.description' => 'descripción',
        'createForm.price' => 'valor',
        'createForm.quantity' => 'cantidad',

        'editForm.name' => 'nombre',
        'editForm.description' => 'descripción',
        'editForm.price' => 'valor',
        'editForm.quantity' => 'cantidad'
    ];

    public function mount(){
        $this->getFruits();
    }

    public function getFruits(){

        $this->reset('suma');

        if ($this->search == "0") {
            $this->fruits = Fruit::all();
            $this->total = Fruit::count();
            $this->unidades = Fruit::sum('quantity');
            
        }else{

            $this->fruits = Fruit::whereMonth('created_at',"{$this->search}")->get();

            $this->total = Fruit::whereMonth('created_at',"{$this->search}")->count();
    
            $this->unidades = Fruit::whereMonth('created_at',"{$this->search}")->sum('quantity');
        }

        foreach ($this->fruits as $fruit) {
            $this->suma = $this->suma +  ($fruit->price * $fruit->quantity);
        }

    }

    public function save(){

        $this->validate();

        Fruit::create($this->createForm);

        $this->reset('createForm');

        $this->getFruits();
    }

    public function edit(Fruit $fruit){

        $this->fruit = $fruit;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $fruit->name;
        $this->editForm['description'] = $fruit->description;
        $this->editForm['price'] = $fruit->price;
        $this->editForm['quantity'] = $fruit->quantity;

    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required',
            'editForm.description' => 'required',
            'editForm.price' => 'required',
            'editForm.quantity' => 'required'
        ]);

        $this->fruit->update($this->editForm);
        $this->reset('editForm');

        $this->getFruits();
    }

    public function delete(Fruit $fruit){
        $fruit->delete();
        $this->getFruits();
    }


    public function render()
    {
        if ($this->search > "0") {
            $this->getFruits();
        }

        return view('livewire.admin.fruit-controller')->layout('layouts.admin');
    }
}
