<?php

namespace App\Http\Livewire\Notificacao;

use App\Models\Animal;
use App\Models\LaboratorialOcorrencias;
use App\Models\Ocorrencia;
use App\Models\OcorrenciaLesao;
use App\Models\OngEProtetor;
use App\Models\ProprietarioETutor;
use App\Models\ResponsavelAnimal;
use Livewire\Component;

class Edit extends Component
{
    /*Animal*/
    public Animal $animal;
    /*Ocorrencia*/
    public Ocorrencia $ocorrencia;

    /*Laboratorial Ocorrencia*/
    public $laboratoriais = [];

    /*ResponsávelAnimal*/
    public ResponsavelAnimal $responsavel_animal;
    /*OngEProtetor*/
    public OngEProtetor $ong_e_protetor;
    /*ProprietarioETutor*/
    public ProprietarioETutor $proprietario_e_tutor;

    /*OcorrenciaLesoes*/
    public $ocorrencia_lesoes = [];

    protected $rules = [
        'animal.nome'=>'required|string',
        'animal.anos'=>'required|integer',
        'animal.meses'=>'required|integer',
        'animal.especie'=>'required|integer',
        'animal.sexo'=>'required|integer',
        'animal.is_castrado'=>'required|boolean',

        'responsavel_animal.tipo_responsavel'=>'required|integer',


        'ocorrencia.is_diagnostico_clinico'=>'required|boolean',
        'ocorrencia.is_primeira_vez_doenca'=>'required|boolean',
        'ocorrencia.protocolo_inicial'=>'required|integer',
        'ocorrencia.outros_protocolos'=>'string',
        'ocorrencia.data_ocorrencia'=>'required|date',
        'ocorrencia.data_inicio_tratamento'=>'required|date',

        'ong_e_protetor.local_captura'=>'required|string',
        'ong_e_protetor.local_tratamento'=>'required|string',
        'ong_e_protetor.nome'=>'required|string',
        'ong_e_protetor.municipio'=>'required|string',
        'ong_e_protetor.endereco'=>'required|string',
        'ong_e_protetor.bairro'=>'required|string',
        'ong_e_protetor.referencia'=>'required|string',
        'ong_e_protetor.telefone'=>'required|string',


        'proprietario_e_tutor.nome'=>'required|string',
        'proprietario_e_tutor.municipio'=>'required|string',
        'proprietario_e_tutor.endereco'=>'required|string',
        'proprietario_e_tutor.bairro'=>'required|string',
        'proprietario_e_tutor.referencia'=>'required|string',
        'proprietario_e_tutor.telefone'=>'required|string',

        'ocorrencia_lesoes.*.local_lesao'=>'required|string',
        'ocorrencia_lesoes.*.numero_lesoes'=>'required|integer',


    ];

    public function mount($animal)
    {
        $this->animal = $animal;
        $this->ocorrencia = $animal->ocorrencia;
        foreach($this->ocorrencia->laboratoriais as $laboratorial){
            array_push($this->laboratoriais,$laboratorial->laboratorial);
        }

        foreach($this->ocorrencia->lesoes as $lesao){
            array_push($this->ocorrencia_lesoes,$lesao);
        }

        $this->responsavel_animal = $animal->responsavel_animal;
        if($animal->responsavel_animal->tipo_responsavel < 3){
            $this->ong_e_protetor = $animal->responsavel_animal->ong_e_protetor;
            $this->proprietario_e_tutor = new ProprietarioETutor();
        }else{
            $this->proprietario_e_tutor = $animal->responsavel_animal->proprietario_e_tutor;
            $this->ong_e_protetor = new OngEProtetor();
        }
    }
    public function render()
    {
        return view('livewire.notificacao.edit');
    }

    public function edit()
    {
        $this->animal->save();

        if($this->ocorrencia->protocolo_inicial != 0){
            $this->ocorrencia->outros_protocolos = null;
        }
        $this->ocorrencia->save();

        $this->ocorrencia->laboratoriais()->delete();
        foreach($this->laboratoriais as $laboratorial){
            LaboratorialOcorrencias::create(['laboratorial'=>$laboratorial,'ocorrencia_id'=>$this->ocorrencia->id]);
        }

        $this->ocorrencia->lesoes()->delete();
        foreach($this->ocorrencia_lesoes as $lesao){
            OcorrenciaLesao::create([
                'numero_lesoes'=>$lesao['numero_lesoes'],
                'local_lesao'=>$lesao['local_lesao'],
                'ocorrencia_id'=>$this->ocorrencia->id
            ]);
        }

        $this->responsavel_animal->save();
        if($this->responsavel_animal->tipo_responsavel < 3){
            $this->ong_e_protetor->responsavel_animal_id = $this->responsavel_animal->id;
            $this->ong_e_protetor->save();
        }else{
            $this->proprietario_e_tutor->responsavel_animal_id = $this->responsavel_animal->id;
            $this->proprietario_e_tutor->save();
        }

        session()->flash('message', 'Ocorrencia editada com sucesso.');
    }

    public function add_lesao()
    {
        $lesao = new OcorrenciaLesao();
        array_push($this->ocorrencia_lesoes,$lesao);

    }

    public function remove_lesao($key)
    {

        unset($this->ocorrencia_lesoes[$key]);
    }
}
