<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratorialOcorrencias extends Model
{
    use HasFactory;
    protected $fillable = ['laboratorial','ocorrencia_id'];
    public $timestamps  = false;

    public function laboratorial_string()
    {
        return [1=>'Citológico',2=>'Histopatológico',3=>'Cultura'][$this->laboratorial];
    }
}
