<?php

namespace App\Exports;

use App\Models\Ocorrencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OcorrenciasExport implements FromView
{
    public function view(): View
    {
        if(auth()->user()->type == 1){
            $ocorrencias = Ocorrencia::orderBy('id','desc')->get();
        }elseif(auth()->user()->type == 0){
            $ocorrencias = auth()->user()->ocorrencias()->orderBy('id','desc')->get();
        }elseif(auth()->user()->type == 2){
            $ocorrencias = Ocorrencia::getByPrefeituraMunicipio()->get();
        }

        return view('exports.ocorrencias', [
            'ocorrencias' => $ocorrencias
        ]);
    }
}
