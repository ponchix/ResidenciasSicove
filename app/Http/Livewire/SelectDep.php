<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Marca;
use App\Models\Modelo;

class SelectDep extends Component
{
    public $selectedMarca=null, $selectedModelo=null;
    public $modelos=null;

    public function render()
    {
        return view('livewire.select-dep',[
            'marcas'=> Marca::all()

        ]);

    }

    public function updatedselectedMarca($id){
      $this->modelos=Modelo::where('id_marca',$id)->get(); 
     
    }
}
