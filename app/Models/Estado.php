<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = ['sigla'];
    protected $with = ['municipios'];

    public function municipios(){
        return $this->hasMany(Municipio::class);
    }
}
