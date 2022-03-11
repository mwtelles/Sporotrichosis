<?php

namespace App\Http\Controllers;

use App\Exports\OcorrenciasExport;
use App\Models\Municipio;
use App\Models\Ocorrencia;
use App\Models\RetornoAnimal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * RENDERIZA VIEW DASHBOARD
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = null;
        if ($request->search) {
            $search = $request->search;
        }
        $caninos = Ocorrencia::join('animal', 'ocorrencia_id', '=', 'ocorrencia.id')->where('animal.especie', 2)->get();
        $felinos = Ocorrencia::join('animal', 'ocorrencia_id', '=', 'ocorrencia.id')->where('animal.especie', 1)->get();
        if (auth()->user()->type == 1) {
            $ocorrencias = Ocorrencia::orderBy('id', 'desc');

        } elseif (auth()->user()->type == 0) {
            $ocorrencias = auth()->user()->ocorrencias()->orderBy('id', 'desc');
        } else {
            $ocorrencias = Ocorrencia::getByPrefeituraMunicipio();
        }
        \Debugbar::info($ocorrencias);
        if ($search) {
            $ocorrencias = $ocorrencias->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })->orWhereHas('animal', function ($q) use ($search) {
                $q->where('nome', 'LIKE', '%' . $search . '%');
            })->orWhere('ocorrencia.id', $search)->orderBy('ocorrencia.id', 'desc');
        }

        $this->getChartTotalOcorrenciasPorMes();
        $this->getChartRetornoOcorrencias();
        if (auth()->user()->type == 2) {
            $this->getChartBairrosNotificadosNoMunicipio(auth()->user()->municipio->bairros);
        }


        return view('dashboard', [
            'ocorrencias' => $ocorrencias->paginate(4),
            'caninos' => count($caninos),
            'felinos' => count($felinos)
        ]);
    }

    /**
     * GERA O GRAFICO DO TOTAL DE OCORRENCIAS POR MES NO ANO ATUAL
     * @return Lavacharts
     * @throws \Khill\Lavacharts\Exceptions\InvalidCellCount
     * @throws \Khill\Lavacharts\Exceptions\InvalidColumnType
     * @throws \Khill\Lavacharts\Exceptions\InvalidLabel
     * @throws \Khill\Lavacharts\Exceptions\InvalidRowDefinition
     * @throws \Khill\Lavacharts\Exceptions\InvalidRowProperty
     */
    public function getChartTotalOcorrenciasPorMes()
    {
        $now = Carbon::now();

        \Lava::DateFormat([
            'formatType' => 'short',
            'pattern' => 'd/m/Y'
        ]);
        $chartData = \Lava::DataTable();
        $chartData->addStringColumn('Year')->addNumberColumn('Total');

        if (auth()->user()->type == 0) {
            $ocorrencias = Ocorrencia::where('users_id', auth()->user()->id)->whereYear('created_at', '=', $now->year)->orderBy('created_at')->get()->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });
        } else {
            $ocorrencias = Ocorrencia::whereYear('created_at', '=', $now->year)->orderBy('created_at')->get()->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });
        }

        foreach ($ocorrencias as $mes => $ocorrencias) {
            $chartData->addRow([getLabelMounth($mes), $ocorrencias->count()]);
        }

        \Lava::ColumnChart('Ocorrencias', $chartData, [
            'title' => 'Ocorrências por mês',
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
    }

    /**
     * GERA O GRAFICO COM COMPARATIVO DE RETORNO DOS ANIMAIS NAS OCORRENCIAS
     * @throws \Khill\Lavacharts\Exceptions\InvalidCellCount
     * @throws \Khill\Lavacharts\Exceptions\InvalidColumnType
     * @throws \Khill\Lavacharts\Exceptions\InvalidLabel
     * @throws \Khill\Lavacharts\Exceptions\InvalidRowDefinition
     * @throws \Khill\Lavacharts\Exceptions\InvalidRowProperty
     */
    public function getChartRetornoOcorrencias()
    {
        $user = auth()->user();
        $now = Carbon::now();
        $chartData = \Lava::DataTable();
        $retorno = [];
        if (auth()->user()->type != 0) {
            $retorno[0] = RetornoAnimal::where('novo_estado', 0)->get()->groupBy('ocorrencia_id');
            $retorno[1] = RetornoAnimal::where('novo_estado', 1)->get()->groupBy('ocorrencia_id');
            $retorno[2] = RetornoAnimal::where('novo_estado', 2)->get()->groupBy('ocorrencia_id');
            $retorno[3] = RetornoAnimal::where('novo_estado', 3)->get()->groupBy('ocorrencia_id');
            $retorno[4] = RetornoAnimal::where('novo_estado', 4)->get()->groupBy('ocorrencia_id');
            $retorno[5] = RetornoAnimal::where('novo_estado', 5)->get()->groupBy('ocorrencia_id');
            $total = Ocorrencia::with('retornos')->count();

            $chartData->addStringColumn('Retornos')
                ->addNumberColumn('Porcentagem')
                ->addRow(['Melhora de Lesões', $retorno[0]->count()])
                ->addRow(['Cura', $retorno[1]->count()])
                ->addRow(['Agravamento dos sintomas', $retorno[2]->count()])
                ->addRow(['Eutanásia', $retorno[3]->count()])
                ->addRow(['Obito', $retorno[4]->count()])
                ->addRow(['Outro', $retorno[5]->count()]);
        } else {
            $retorno[0] = $user->ocorrencias()->whereHas('retornos', function ($q) {
                $q->where('novo_estado', 0);
            })->get()->pluck('retornos')->groupBy('ocorrencia_id');
            $retorno[1] = $user->ocorrencias()->whereHas('retornos', function ($q) {
                $q->where('novo_estado', 1);
            })->get()->pluck('retornos')->groupBy('ocorrencia_id');
            $retorno[2] = $user->ocorrencias()->whereHas('retornos', function ($q) {
                $q->where('novo_estado', 2);
            })->get()->pluck('retornos')->groupBy('ocorrencia_id');
            $retorno[3] = $user->ocorrencias()->whereHas('retornos', function ($q) {
                $q->where('novo_estado', 3);
            })->get()->pluck('retornos')->groupBy('ocorrencia_id');
            $retorno[4] = $user->ocorrencias()->whereHas('retornos', function ($q) {
                $q->where('novo_estado', 4);
            })->get()->pluck('retornos')->groupBy('ocorrencia_id');
            $total = $user->with('ocorrencias.retornos')->count();
            $chartData->addStringColumn('Retornos')
                ->addNumberColumn('Porcentagem')
                ->addRow(['Melhora de Lesões', ($retorno[0]->count() == 0) ? 0 : $retorno[0][""]->count()])
                ->addRow(['Cura', ($retorno[1]->count() == 0) ? 0 : $retorno[1][""]->count()])
                ->addRow(['Agravamento dos sintomas', ($retorno[2]->count() == 0) ? 0 : $retorno[2][""]->count()])
                ->addRow(['Eutanásia', ($retorno[3]->count() == 0) ? 0 : $retorno[3][""]->count()])
                ->addRow(['Obito', ($retorno[4]->count() == 0) ? 0 : $retorno[4][""]->count()]);
        }

        return \Lava::DonutChart('Retorno', $chartData, [
            'title' => 'Retornos do animal:  '.$total,
            'titleTextStyle' => [
                'color' => '#eb6b2c',
                'fontSize' => 14
            ],
            'height' => 300
        ]);
    }

    public function getChartBairrosNotificadosNoMunicipio($bairros)
    {
        $chartData = \Lava::DataTable();

        $chartData->addStringColumn('Bairros');
        $chartData->addNumberColumn('Notificações');

        foreach ($bairros as $bairro) {
            $ocorrencias_bairro = Ocorrencia::permitidas()->porBairro($bairro->id)->get();

            $chartData->addRow(
                [$bairro->nome, $ocorrencias_bairro->count()]);
        }
        return \Lava::ColumnChart('porBairro', $chartData, [
            'title' => 'Ocorrências por Bairro',
            'height' => 300,
            'pointSize' => 1
        ]);
    }

    public function export()
    {
        return Excel::download(new OcorrenciasExport(), 'ocorrencias.xlsx');
    }
}
