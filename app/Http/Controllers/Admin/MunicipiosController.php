<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function store(Request $request){
        $municipio = Municipio::create([
            'nome'=>$request->nome,
            'estado_id'=>$request->estado_id
        ]);

        return redirect()->route('admin.configuracoes.index');
    }

    public function getByEstado(Estado $estado){
        $municipios = $estado->municipios;
        return response()->json($municipios);
    }
}
