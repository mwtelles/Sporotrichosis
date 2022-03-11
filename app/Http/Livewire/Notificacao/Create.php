<?php

namespace App\Http\Livewire\Notificacao;

use App\Models\Animal;
use App\Models\Estado;
use App\Models\FotosOcorrencia;
use App\Models\LaboratorialOcorrencias;
use App\Models\Municipio;
use App\Models\Ocorrencia;
use App\Models\OcorrenciaLesao;
use App\Models\OngEProtetor;
use App\Models\ProprietarioETutor;
use App\Models\ResponsavelAnimal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    /*Animal*/
    public Animal $animal;
    /*Laboratorial Ocorrencia*/
    public $laboratoriais = [];
    /*Ocorrencia*/
    public Ocorrencia $ocorrencia;
    /*ResponsávelAnimal*/
    public ResponsavelAnimal $responsavel_animal;
    /*OngEProtetor*/
    public OngEProtetor $ong_e_protetor;
    /*ProprietarioETutor*/
    public ProprietarioETutor $proprietario_e_tutor;
    /*OcorrenciaLesoes*/
    public $ocorrencia_lesoes = [];
    /*FotosOcorrencia*/
    public $fotos_ocorrencia = [];

    public $estados  = [];
    public $estado;
    public $municipios  = [];
    public $municipio;
    public $bairros = [];
    public $bairro;

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


        'ong_e_protetor.local_captura'=>'string',
        'ong_e_protetor.local_tratamento'=>'string',
        'ong_e_protetor.nome'=>'string',
        'ong_e_protetor.endereco'=>'string',
        'ong_e_protetor.referencia'=>'string',
        'ong_e_protetor.telefone'=>'string',


        'proprietario_e_tutor.nome'=>'string',
        'proprietario_e_tutor.endereco'=>'string',
        'proprietario_e_tutor.referencia'=>'string',
        'proprietario_e_tutor.telefone'=>'string',

        'ocorrencia_lesoes'=>'required',
        'ocorrencia_lesoes.*.local_lesao'=>'required|string',
        'ocorrencia_lesoes.*.numero_lesoes'=>'required|integer',


    ];

    public function mount()
    {
        $this->animal = new Animal();
        $this->ocorrencia = new Ocorrencia();
        $this->ong_e_protetor = new OngEProtetor();
        $this->proprietario_e_tutor = new ProprietarioETutor();
        $this->responsavel_animal = new ResponsavelAnimal();
        $this->estados = Estado::all();
    }

    public function updatedEstado($value){
        if($value){
            $this->municipios = Estado::find($value)->municipios;
        }

    }

    public function updatedMunicipio($value){
        if($value){
            $this->bairros = Municipio::find($value)->bairros;
        }

    }
    public function render()
    {
        return view('livewire.notificacao.create');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->validate();

        if($this->responsavel_animal->tipo_responsavel < 3){
            $this->validate([
                'ong_e_protetor.local_captura'=>'required|string',
                'ong_e_protetor.local_tratamento'=>'required|string',
                'ong_e_protetor.nome'=>'required|string',
                'ong_e_protetor.endereco'=>'required|string',
                'ong_e_protetor.referencia'=>'string',
                'ong_e_protetor.telefone'=>'required|string',
            ]);
            $this->ong_e_protetor->municipio_id = $this->municipio;
            $this->ong_e_protetor->bairro_id = $this->bairro;
        }else{
            $this->validate([
                'proprietario_e_tutor.nome'=>'required|string',
                'proprietario_e_tutor.endereco'=>'required|string',
                'proprietario_e_tutor.referencia'=>'string',
                'proprietario_e_tutor.telefone'=>'required|string',
            ]);
            $this->proprietario_e_tutor->municipio_id = $this->municipio;
            $this->proprietario_e_tutor->bairro_id = $this->bairro;
        }

        if($this->ocorrencia->protocolo_inicial != 0){
            $this->ocorrencia->outros_protocolos = null;
        }else{
            $this->validate([
                'ocorrencia.outros_protocolos'=>'required|string',
            ]);
        }



        $this->ocorrencia->users_id = auth()->user()->id;
        $this->ocorrencia->save();

        foreach ($this->fotos_ocorrencia as $foto) {
            $fotos_ocorrencia = new FotosOcorrencia();
            $fotos_ocorrencia->extensao = $foto->store('fotos_ocorrencia','public');
            $fotos_ocorrencia->ocorrencia_id = $this->ocorrencia->id;

            $fotos_ocorrencia->save();
        }

        foreach($this->ocorrencia_lesoes as $lesao){
            OcorrenciaLesao::create([
                'numero_lesoes'=>$lesao['numero_lesoes'],
                'local_lesao'=>$lesao['local_lesao'],
                'ocorrencia_id'=>$this->ocorrencia->id
            ]);
        }

        foreach($this->laboratoriais as $laboratorial){
            LaboratorialOcorrencias::create(['laboratorial'=>$laboratorial,'ocorrencia_id'=>$this->ocorrencia->id]);
        }



        $this->animal->ocorrencia_id = $this->ocorrencia->id;
        $this->animal->save();
        $this->responsavel_animal->animal_id = $this->animal->id;
        $this->responsavel_animal->save();

        if($this->responsavel_animal->tipo_responsavel < 3){
            $this->ong_e_protetor->responsavel_animal_id = $this->responsavel_animal->id;
            $this->ong_e_protetor->save();
        }else{
            $this->proprietario_e_tutor->responsavel_animal_id = $this->responsavel_animal->id;
            $this->proprietario_e_tutor->save();
        }

        $this->animal = new Animal();
        $this->ocorrencia = new Ocorrencia();
        $this->ong_e_protetor = new OngEProtetor();
        $this->proprietario_e_tutor = new ProprietarioETutor();
        $this->responsavel_animal = new ResponsavelAnimal();
        $this->ocorrencia_lesoes = [];
        $this->laboratoriais=[];

        session()->flash('message', 'Ocorrencia cadastrada com sucesso.');
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
