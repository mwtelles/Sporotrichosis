<?php

namespace App\Http\Controllers;

use App\Exports\OcorrenciaPorBairroExport;
use App\Exports\OcorrenciasExport;
use App\Models\Bairro;
use App\Models\Ocorrencia;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NotificacaoController extends Controller
{
    public function index(Request $request){
        $ocorrencias = Ocorrencia::permitidas();

        if($request->bairro){
            $ocorrencias = $ocorrencias->porBairro($request->bairro);
        }
        return view('livewire.notificacao.index',[
            'ocorrencias'=>$ocorrencias->paginate(10)
        ]);
    }

    public function exportBairro(Request $request ){
        if($request->bairro){
            $ocorrencias = Ocorrencia::porBairro($request->bairro)->get();
            $bairro = Bairro::find($request->bairro);
            return Excel::download(new OcorrenciaPorBairroExport($bairro), 'Ocorrencias_'.$bairro->nome.'.xlsx');
        }
        return Excel::download(new OcorrenciasExport(), 'ocorrencias.xlsx');
    }
}
