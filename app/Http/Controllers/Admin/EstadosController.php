<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function store(Request $request){
        $estado = Estado::create([
            'sigla' =>  $request->sigla
        ]);

        return redirect()->route('admin.configuracoes.index');
    }
}
