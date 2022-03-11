<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações do sistema') }}
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="flex justify-center w-100 items-center ">
            <!--actual component start-->
            <div x-data="setup()">
                <ul class="flex justify-center items-center my-4">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                            :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                </ul>

                <div class="w-100 bg-white p-5 text-center mx-auto border">
                    <div x-show="activeTab===0">
                        @include('admin.configuracoes.estados.create')
                        <div class="relative  my-2">

                            <form>
                                <input name="estado" type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Procurar Estado">
                                <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-search"></i>
                                    Buscar
                                </button>
                                <a href="/configuracoes" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-redo"></i>
                                    Limpar
                                </a>
                            </form>

                        </div>
                        <div class=" my-2 inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Código
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Sigla
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estados as $estado)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        #{{$estado->id}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$estado->sigla}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$estados->links()}}
                        </div>
                    </div>
                    <div x-show="activeTab===1">
                        @include('admin.configuracoes.municipios.create')
                        <div class="relative  my-2">

                            <form>
                                <input name="municipio" type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Procurar Municipio">
                                <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-search"></i>
                                    Buscar
                                </button>
                                <a href="/configuracoes" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-redo"></i>
                                    Limpar
                                </a>
                            </form>

                        </div>
                        <div class=" my-2 inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Código
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Estado
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($municipios as $municipio)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        #{{$municipio->id}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$municipio->nome}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$municipio->estado->sigla}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$municipios->links()}}
                        </div>
                    </div>
                    <div x-show="activeTab===2">
                        @include('admin.configuracoes.bairros.create')
                        <div class="relative  my-2">

                            <form>
                                <input name="bairro" type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Procurar Bairro">
                                <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-search"></i>
                                    Buscar
                                </button>
                                <a href="/configuracoes" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                    <i class="fas fa-redo"></i>
                                    Limpar
                                </a>
                            </form>

                        </div>
                        <div class=" my-2 inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Código
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Municipio
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Estado
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bairros as $bairro)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        #{{$bairro->id}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$bairro->nome}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$bairro->municipio->nome}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$bairro->municipio->estado->sigla}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$municipios->links()}}
                        </div>
                    </div>
                </div>


                <div class="flex gap-4 justify-center border-t p-4">
                    <button
                        class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
                        @click="activeTab--" x-show="activeTab>0"
                    >Voltar</button>
                    <button
                        class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
                        @click="activeTab++" x-show="activeTab<tabs.length-1"
                    >Próximo</button>
                </div>
            </div>
            <!--actual component end-->
        </div>

    </div>

    <script>
        function setup() {
            return {
                activeTab: 2,
                tabs: [
                    "Estados",
                    "Municipios",
                    "Bairros",
                ]
            };
        };
    </script>
</x-app-layout>
