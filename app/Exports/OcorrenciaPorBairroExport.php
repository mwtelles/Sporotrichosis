<?php

namespace App\Exports;

use App\Models\Bairro;
use App\Models\Ocorrencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OcorrenciaPorBairroExport implements FromView
{
    public function __construct(Bairro $bairro)
    {
        $this->bairro = $bairro;
    }
    public function view(): View
    {
        $ocorrencias = Ocorrencia::porBairro($this->bairro->id)->get();

        return view('exports.ocorrencias', [
            'ocorrencias' => $ocorrencias
        ]);
    }

}
