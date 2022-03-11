<x-app-layout>
    <x-slot name="header" >
        <h2 data-intro='Bem vindo ao painel de notificação de esporotricose. Clique em "próximo" para um breve tutorial do dashboard'  class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>
    <style>
        html,
        body {
            height: 100%;
        }

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
    <div class="py-12"  >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success -->

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div
                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                            <i class="fas fa-paw"></i>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Caninos</div>
                            <div class="font-bold text-lg">{{$caninos}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div
                            class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green">
                            <i class="fas fa-cat"></i>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Felinos</div>
                            <div class="font-bold text-lg">{{$felinos}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="modal-pwa"  class="hidden bg-green-50 p-4 rounded flex items-start text-green-600 my-4 shadow-lg  max-w-xl ">
                <div class="text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.959 17l-4.5-4.319 1.395-1.435 3.08 2.937 7.021-7.183 1.422 1.409-8.418 8.591z"/></svg>
                </div>
                <div class=" px-3">
                    <h3  class="text-green-800 font-semibold tracking-wider">
                        Instale o aplicativo
                    </h3>
                    <p class="py-2 text-green-700">
                        Instale o aplicativo Notificação de Esporotricose Animal em seu dispositivo para uma melhor experiência.
                    </p>
                    <div class="space-x-6">
                        <button id="install-pwa" class="text-green-900 font-semibold tracking-wider hover:underline focus:outline-none">Instalar</button>
                        <button onclick="document.getElementById('modal-pwa').classList.add('hidden')" class="text-green-900 font-semibold tracking-wider hover:underline focus:outline-none">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create',\App\Models\Ocorrencia::class)
                <a data-disable-interaction="1" data-intro='Você pode clicar aqui para cadastrar novas notificações' href="{{route('notificacao.create')}}"
                   type="button"
                   class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                ><i class="fas fa-plus"></i> Nova Notificação</a>
            @endcan

            <div data-intro='Visualize suas ocorrências cadastradas no mês' id="ocorrencias_mes" class=" py-2 m-2"></div>
            @columnchart('Ocorrencias','ocorrencias_mes')
            <div data-intro='Visualize os dados de retorno do animal' id="retorno_ocorrencias" class=" py-2 m-2"></div>
            @donutchart('Retorno','retorno_ocorrencias')
            @if(auth()->user()->type == 2)
                <div id="ocorrencias_por_bairro" class=" py-2 m-2"></div>
                @columnchart('porBairro','ocorrencias_por_bairro')
            @endif
            @if(count($ocorrencias) > 0)
                <h3 class="font-semibold m-2 text-xl leading-tight sm:leading-normal">Últimas Notificações</h3>
                <div class="relative mr-6 my-2 float-right" data-disable-interaction="1" data-intro='Busque as notificações cadastradas'>
                    <form style="display: grid;
    grid-template-columns: auto auto;">
                        <input name="search" type="search" class="bg-purple-white shadow rounded border-0 p-3"
                               placeholder="Procurar notificação">
                        <button type="submit"
                                class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-search"></i>
                            Buscar
                        </button>
                        <a href="/export"
                           class="border border-green-500 bg-blue-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-file-export"></i>
                            Exportar
                        </a>
                        <a href="/dashboard"
                           class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                            <i class="fas fa-redo"></i>
                            Limpar
                        </a>
                    </form>
                </div>
            @endif
            <div class="p-2">
                <div class=" container">
                    <table data-disable-interaction="1" data-intro='Nesse espaço ficará listado as ocorrências cadastradas com a opção de visualização de cada uma.'
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
    </div>


</x-app-layout>
