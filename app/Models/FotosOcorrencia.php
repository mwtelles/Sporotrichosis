<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosOcorrencia extends Model
{
    use HasFactory;
    protected $table = 'fotos_ocorrencia';
    protected $guarded = ['id'];
}
