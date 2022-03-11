<?php

namespace App\Http\Livewire\Notificacao;

use App\Models\Animal;
use App\Models\Ocorrencia;
use App\Models\OngEProtetor;
use App\Models\ProprietarioETutor;
use App\Models\ResponsavelAnimal;
use Livewire\Component;

class Show extends Component
{
    /*Animal*/
    public Animal $animal;
    /*Ocorrencia*/
    public Ocorrencia $ocorrencia;

    /*ResponsávelAnimal*/
    public ResponsavelAnimal $responsavel_animal;
    /*OngEProtetor*/
    public OngEProtetor $ong_e_protetor;
    /*ProprietarioETutor*/
    public ProprietarioETutor $proprietario_e_tutor;

    protected $rules = [
        'animal.nome'=>'required|string',
        'animal.idade'=>'required|integer',
        'animal.especie'=>'required|integer',
        'animal.sexo'=>'required|integer',
        'animal.is_castrado'=>'required|boolean',

        'responsavel_animal.tipo_responsavel'=>'required|integer',


        'ocorrencia.is_diagnostico_clinico'=>'required|boolean',
        'ocorrencia.laboratorial'=>'required|integer',
        'ocorrencia.is_primeira_vez_doenca'=>'required|boolean',
        'ocorrencia.local_lesao'=>'required|string',
        'ocorrencia.numero_lesoes'=>'required|integer',
        'ocorrencia.protocolo_inicial'=>'required|integer',

        'ong_e_protetor.local_captura'=>'required|string',
        'ong_e_protetor.local_tratamento'=>'required|string',

        'proprietario_e_tutor.nome'=>'required|string',
        'proprietario_e_tutor.endereco'=>'required|string',
        'proprietario_e_tutor.bairro'=>'required|string',
        'proprietario_e_tutor.referencia'=>'required|string',
        'proprietario_e_tutor.telefone'=>'required|string',


    ];

    public function mount($ocorrencia)
    {

        $this->animal = $ocorrencia->animal;
        $this->ocorrencia = $ocorrencia;

        $this->responsavel_animal = $ocorrencia->animal->responsavel_animal;
        if($ocorrencia->animal->responsavel_animal->tipo_responsavel < 3){
            $this->ong_e_protetor = $ocorrencia->animal->responsavel_animal->ong_e_protetor;
            $this->proprietario_e_tutor = new ProprietarioETutor();
        }else{
            $this->proprietario_e_tutor = $ocorrencia->animal->responsavel_animal->proprietario_e_tutor;
            $this->ong_e_protetor = new OngEProtetor();
        }
    }
    public function render()
    {
        return view('livewire.notificacao.show');
    }
}
