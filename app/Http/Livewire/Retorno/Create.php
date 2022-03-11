<?php

namespace App\Http\Livewire\Retorno;

use App\Models\Animal;
use App\Models\FotosRetornoAnimal;
use App\Models\RetornoAnimal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $cadastrando = false;
    public RetornoAnimal $retorno_animal;
    public $fotos_retorno_animal;
    public Animal $animal;
    protected $rules = [
      'retorno_animal.data'=>'required|date',
        'retorno_animal.novo_estado'=>'required|integer',
        'retorno_animal.descricao'=>'string',
        'fotos_retorno_animal.*'=>'required|image|max:10024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($animal)
    {
        $this->animal = $animal;
        $this->retorno_animal = new RetornoAnimal();
    }
    public function render()
    {
        return view('livewire.retorno.create');
    }

    public function store()
    {
        $this->retorno_animal['ocorrencia_id'] = $this->animal->ocorrencia->id;
        $this->retorno_animal->save();

        foreach ($this->fotos_retorno_animal as $foto) {
            $foto_retorno = new FotosRetornoAnimal();
            $foto_retorno->imagem = $foto->store('fotos_retorno_animal','public');
            $foto_retorno->retorno_animal_id = $this->retorno_animal->id;

            $foto_retorno->save();

//            FotosRetornoAnimal::create([
////                'imagem'=>,
////                'retorno_animal_id'=>$this->retorno_animal->id
//            ]);
        }

        $this->retorno_animal = new RetornoAnimal();
        $this->fotos_retorno_animal = [];
        $this->toggleCadastrando();

        session()->flash('message','Retorno cadastrado com sucesso.');
        return redirect()->to('/notificacao/'.$this->animal->ocorrencia->id);
    }
    public function toggleCadastrando()
    {
        $this->cadastrando = !$this->cadastrando;

    }
}
