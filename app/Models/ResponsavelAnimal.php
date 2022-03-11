<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsavelAnimal extends Model
{
    use HasFactory;

    protected $guarded;
    protected $table = 'responsavel_animal';


    public function proprietario_e_tutor()
    {
        return $this->hasOne('App\Models\ProprietarioETutor', 'responsavel_animal_id', 'id');
    }

    public function ong_e_protetor()
    {
        return $this->hasOne('App\Models\OngEProtetor', 'responsavel_animal_id', 'id');
    }

    public function tipo_responsavel_string()
    {
        return [1 => 'Ong', 2 => 'Protetor', 3 => 'Proprietario', 4 => 'Tutor'][$this->tipo_responsavel];
    }

}
