<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaLesao extends Model
{
    use HasFactory;

    protected $table = 'ocorrencia_lesoes';

    protected $guarded = ['id'];
}
