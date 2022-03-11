<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'animal';

    public function ocorrencia()
    {
        return $this->hasOne('App\Models\Ocorrencia','id','ocorrencia_id');
    }

    public function responsavel_animal()
    {
        return $this->hasOne('App\Models\ResponsavelAnimal','animal_id','id');
    }

    public function especie_string()
    {
        return [1=>'Felino',2=>'Canino'][$this->especie];
    }

    public function sexo_string()
    {
        return [1=>'Feminino',2=>'Masculino'][$this->sexo];
    }

    public function is_castrado_string()
    {
        return [0=>'Não',1=>'Sim'][$this->is_castrado];
    }
}
