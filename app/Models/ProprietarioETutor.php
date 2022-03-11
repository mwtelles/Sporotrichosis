<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprietarioETutor extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'proprietario_e_tutor';


    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function bairro(){
        return $this->belongsTo(Bairro::class);
    }

    public function getTableName()
    {
        return $this->table;
    }
}
