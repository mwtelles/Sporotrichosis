<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetornoAnimal extends Model
{
    use HasFactory;

    protected $table = 'retorno_animal';
    protected $fillable = ['data','novo_estado','ocorrencia_id','descricao'];

    public function novo_estado_string()
    {
        return [0=>'Melhora de Lesões',1=>'Cura',2=>'Agravamento dos sintomas',3=>'Eutanásia',4=>'Obito',5=>'Outro'][$this->novo_estado];
    }

    public function fotos()
    {
        return $this->hasMany('App\Models\FotosRetornoAnimal');
    }

    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class,'ocorrencia_id','id');
    }

    public function scopeCura($query)
    {
        return $query->where('novo_estado',0);
    }
}
