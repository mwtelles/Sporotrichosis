<?php

namespace App\Http\Livewire\Retorno;

use App\Models\RetornoAnimal;
use Livewire\Component;

class Show extends Component
{
    public $retornos;

    public function mount($animal)
    {
        $this->retornos = $animal->ocorrencia->retornos;
    }
    public function render()
    {
        return view('livewire.retorno.show');
    }
}
