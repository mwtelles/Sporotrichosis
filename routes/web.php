<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::middleware(['auth:sanctum', 'verified','block'])->group(function(){
    Route::get('/municipios/estado/{estado}','Admin\MunicipiosController@getByEstado');
    Route::get('/bairros/municipio/{municipio}','Admin\BairrosController@getByMunicipio');

    Route::name('admin.')->middleware('admin')->group(function(){
        Route::resource('users','Admin\UsersController');
        Route::resource('configuracoes','Admin\ConfiguracoesController');
        Route::resource('estados','Admin\EstadosController');
        Route::resource('municipios','Admin\MunicipiosController');
        Route::resource('bairros','Admin\BairrosController');
    });

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/export', 'DashboardController@export')->name('export');
    Route::get('/notificacoes/export_bairro', 'NotificacaoController@exportBairro')->name('export_bairro');

    Route::get('/tutorialCompleted','UsersController@tutorialCompleted');
    Route::prefix('notificacao')->group(function(){
        Route::get('/cadastrar', function(){
            return view('notificacao.create');
        })->middleware('adminAndUser')->name('notificacao.create');

        Route::get('/{notificacao}', function( $notificacao){
            $ocorrencia = \App\Models\Ocorrencia::find($notificacao);
            if(auth()->user()->type == 0 and $ocorrencia->user->id != auth()->user()->id){
                return redirect('/dashboard');
            }

            return view('notificacao.show',['notificacao'=>$notificacao]);
        })->name('notificacao.show');
        Route::get('/','NotificacaoController@index')->name('notificacao.index');
    });



});
