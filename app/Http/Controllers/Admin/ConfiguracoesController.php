<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bairro;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ConfiguracoesController extends Controller
{
    public function index(Request $request){
        $estados = Estado::paginate(10);
        $municipios = Municipio::paginate(10);
        $bairros = Bairro::paginate(10);
        if($request->estado){
            $estados = Estado::where('sigla',$request->estado)->paginate(10);
        }
        if($request->municipio){
            $municipios = Municipio::where('nome',$request->municipio)->paginate(10);
        }
        if($request->bairro){
            $bairros = Bairro::where('nome',$request->bairro)->paginate(10);
        }
        return view('admin.configuracoes.index',[
            'estados'=> $estados,
            'municipios'=> $municipios,
            'bairros'=> $bairros,
        ]);
    }
}
