<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OngEProtetor extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'ong_e_protetor';

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
