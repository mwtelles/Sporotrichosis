<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bairro;
use App\Models\Municipio;
use Illuminate\Http\Request;

class BairrosController extends Controller
{
    public function store(Request $request){
        $municipio = Bairro::create([
            'nome'=>$request->nome,
            'estado_id'=>$request->estado_id,
            'municipio_id'=>$request->municipio_id
        ]);

        return redirect()->route('admin.configuracoes.index');
    }

    public function getByMunicipio(Municipio $municipio){
        $bairros = $municipio->bairros;
        return response()->json($bairros);
    }
}
