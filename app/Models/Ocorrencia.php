<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $guarded;
    protected $table = 'ocorrencia';

    public $protocolos = [
        'Itraconazol',
        'Itraconazol + Iodeto de Potássio',
        'Anfotericona B ',
        'Eutanásia',
    ];

    public function laboratoriais()
    {
        return $this->hasMany('App\Models\LaboratorialOcorrencias');
    }

    public function scopePorBairro($query, $bairro)
    {


        return $query->whereHas('animal', function ($q) use ($bairro) {
            return $q->whereHas('responsavel_animal', function ($qu) use ($bairro) {
                return $qu->whereHas('proprietario_e_tutor', function ($que) use ($bairro) {
                    return $que->where('proprietario_e_tutor.bairro_id', $bairro);
                })->orWhereHas('ong_e_protetor', function ($que) use ($bairro) {
                    return $que->where('ong_e_protetor.bairro_id', $bairro);
                });
            });
        });
    }

    public function scopePermitidas($query){
        if(auth()->user()->type == 0){
            return $query->where('ocorrencia.users_id',auth()->user()->id);
        }
        if(auth()->user()->type == 1){
            return $query;
        }
        if(auth()->user()->type == 2){
            return $query->whereHas('animal', function ($q)  {
                return $q->whereHas('responsavel_animal', function ($qu)  {
                    return $qu->whereHas('proprietario_e_tutor', function ($que)  {
                        return $que->where('proprietario_e_tutor.municipio_id', auth()->user()->municipio_id);
                    })->orWhereHas('ong_e_protetor', function ($que)  {
                        return $que->where('ong_e_protetor.municipio_id', auth()->user()->municipio_id);
                    });
                });
            });
        }

    }

    public function lesoes()
    {
        return $this->hasMany('App\Models\OcorrenciaLesao');
    }

    public function retornos()
    {
        return $this->hasMany('App\Models\RetornoAnimal');
    }

    public function is_diagnostico_clinico_string()
    {
        return [1 => 'Sim', 0 => 'Não'][$this->is_diagnostico_clinico];
    }


    public function is_primeira_vez_doenca_string()
    {
        return [1 => 'Sim', 0 => 'Não'][$this->is_primeira_vez_doenca];
    }

    public function protocolo_inicial_string()
    {
        $protocolo = [0 => 'outros', 1 => 'Itraconazol', 2 => 'Itraconazol + Iodeto de Potássio', 3 => 'Anfotericona B', 4 => 'Eutanásia'][$this->protocolo_inicial];
        if ($this->protocolo_inicial == 0) {
            $protocolo = $this->outros_protocolos;
        }
        return $protocolo;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id', 'ocorrencia_id');
    }

    public function fotos()
    {
        return $this->hasMany(FotosOcorrencia::class, 'ocorrencia_id', 'id');
    }

    public function scopeGetByPrefeituraMunicipio($query)
    {
        return $query->whereHas('animal', function ($q) {
            $q->whereHas('responsavel_animal', function ($qu) {
                return $qu->whereHas('proprietario_e_tutor', function ($que)  {
                    return $que->where('proprietario_e_tutor.municipio_id', auth()->user()->municipio->id);
                })->orWhereHas('ong_e_protetor', function ($que)  {
                    return $que->where('ong_e_protetor.municipio_id', auth()->user()->municipio->id);
                });
            });
        });
    }

    public function scopeGetByEspecieAnimalByPrefeituraMunicipio($query, $especie)
    {

          return $query->whereHas('animal', function ($q) use ($especie) {
            return $q->where('animal.especie', $especie)
                ->whereHas('responsavel_animal', function ($qu) {
                    return $qu->whereHas('proprietario_e_tutor', function ($que)  {
                        return $que->where('proprietario_e_tutor.municipio_id', auth()->user()->municipio->id);
                    })->orWhereHas('ong_e_protetor', function ($que)  {
                        return $que->where('ong_e_protetor.municipio_id', auth()->user()->municipio->id);
                    });
                });
        });

    }

    public function scopeGetByEspecieAnimal($query, $especie)
    {
        $query->select('ocorrencia.*')
            ->join('animal', 'ocorrencia_id', '=', 'ocorrencia.id')
            ->where('animal.especie', $especie);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new \App\Models\Scopes\Municipio());
    }
}
