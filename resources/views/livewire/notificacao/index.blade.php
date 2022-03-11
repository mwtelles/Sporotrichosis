<x-app-layout>
    <style>
        @media (min-width: 640px) {
            table {
                display: inline-table !important;
            }

            thead tr:not(:first-child) {
                display: none;
            }
            form {
                grid-template-columns: repeat(4, 1fr) !important;
            }

        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }
    </style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notificações') }}
            </h2>
        </x-slot>
        <div class="relative ">
            <form style="display: grid; grid-template-columns: auto ; grid-gap: 0.2rem">
                <select id="estado" name="estado" onchange="updateMunicipios()"
                        class="bg-purple-white m-2 shadow rounded border-0 p-3">
                    <option readonly="">Selecione um estado</option>
                    @foreach(\App\Models\Estado::all() as $estado)
                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                    @endforeach
                </select>
                <select onchange="updateBairros()" id="municipio" name="municipio"
                        class="bg-purple-white m-2 shadow rounded border-0 p-3">
                    <option readonly="">Selecione um municipio</option>

                </select>
                <select id="bairro" name="bairro" class="bg-purple-white shadow rounded border-0 m-2 p-3">
                    <option readonly="">Selecione um bairro</option>

                </select>
                <button type="submit"
                        class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-search"></i>
                    Buscar
                </button>
                <a href="/notificacoes/export_bairro?bairro={{request()->bairro??null}}"
                   class="border text-center border-green-500 bg-blue-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-file-export"></i>
                    Exportar
                </a>
                <a href="/notificacao"
                   class="border text-center border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-redo"></i>
                    Limpar
                </a>
            </form>
        </div>
        <h3 class="font-semibold m-2 text-xl leading-tight sm:leading-normal"> Notificações</h3>
        <div class="p-2">
            <div class=" container">
                <table
                    class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                    <thead class="text-white">
                    @foreach($ocorrencias as $ocorrencia)
                        <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left">Número de Protocolo</th>
                            <th class="p-3 text-left">Data da ocorrência</th>
                            <th class="p-3 text-left">Animal</th>
                            <th class="p-3 text-left">Responsável</th>
                            <th class="p-3 text-left">Cadastrado por</th>
                            <th class="p-3 text-left">Ações</th>
                        </tr>
                    @endforeach
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                    @foreach($ocorrencias as $ocorrencia)
                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                #{{$ocorrencia->id}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                {{date('d/m/Y',strtotime($ocorrencia->data_ocorrencia))}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                {{$ocorrencia->animal->nome}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                @if($ocorrencia->animal->responsavel_animal->tipo_responsavel < 3 )
                                    Ong/ Protetor
                                @else
                                    Proprietário/ Tutor
                                @endif
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                {{$ocorrencia->user->name}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer">
                                    <span
                                        onclick="window.location.href = 'notificacao/{{$ocorrencia->id}}'">Visualizar</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$ocorrencias->links()}}
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
    <script>
        @if(auth()->user()->type == 2)
        $('#estado').html('<option>{!! auth()->user()->municipio->estado->sigla !!}</option>')
        $('#municipio').html('<option>{!! auth()->user()->municipio->nome !!}</option>')
        $('#bairro').html('@php
            $bairro_search = request()->bairro;
            foreach(auth()->user()->municipio->bairros as $bairro){
                $is_selected = ($bairro->id == $bairro_search)?"selected":"";
                echo '<option '.$is_selected.' value='.$bairro->id.'>'.$bairro->nome.'</option>';
            }
        @endphp')

        @endif

        function updateMunicipios() {
            let estado = $('#estado').val();
            $('#municipio').html('<option>Selecione um municipio</option>');
            $.ajax({
                url: '/municipios/estado/' + estado,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    data.forEach(function (municipio) {
                        console.log(municipio);
                        $('#municipio').append("<option value='" + municipio.id + "'>" + municipio.nome + "</option>")
                    });
                }
            })
        }

        function updateBairros() {
            let municipio = $('#municipio').val();
            $('#bairro').html('<option>Selecione um bairro</option>');
            $.ajax({
                url: '/bairros/municipio/' + municipio,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    data.forEach(function (bairro) {
                        $('#bairro').append("<option value='" + bairro.id + "'>" + bairro.nome + "</option>")
                    });
                }
            })
        }
    </script>
</x-app-layout>
