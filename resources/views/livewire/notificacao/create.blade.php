<div>
    <div class="p-5">
        <div class="mt-2">
            <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Animal</div>
                <div class="flex">
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Nome</label>
                        <div class="flex">
                            <div class=" @error('animal.nome') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <input  wire:model="animal.nome"
                                       class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Anos</label>
                        <div class="flex">
                            <div class=" @error('animal.anos') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <input min="0" wire:model="animal.anos" type="number"
                                       class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Meses</label>
                        <div class="flex">
                            <div class="@error('animal.meses') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <input min="0" wire:model="animal.meses" type="number"
                                       class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex">
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Especie</label>
                        <div class="flex">
                            <select wire:model="animal.especie" class=" @error('animal.especie') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select w-full" >
                                <option value=""></option>
                                <option value="1">Felino</option>
                                <option value="2">Canino</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Sexo</label>
                        <div class="flex">
                            <select wire:model="animal.sexo" class=" @error('animal.sexo') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select w-full">
                                <option value=""></option>
                                <option value="1">Feminino</option>
                                <option value="2">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-1/2 flex-1 px-3 mb-5">
                        <label for="" class="text-xs font-semibold px-1">Castrado</label>
                        <div class="flex">
                            <select wire:model="animal.is_castrado" class=" @error('animal.is_castrado') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select w-full">
                                <option value=""></option>
                                <option value="0">Não castrado</option>
                                <option value="1">Castrado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-col md:flex-row pb-4 mb-4 border-b border-gray-200">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Responsável
                    {{--                    <div class="text-xs font-normal leading-none text-gray-500">Your billing address</div>--}}
                </div>
                <div class="flex-1">
                    <select class=" @error('responsavel_animal.tipo_responsavel') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select  w-full" wire:model="responsavel_animal.tipo_responsavel">
                        <option value="">Selecione um responsável</option>
                        <option value="1">Ong</option>
                        <option value="2">Protetor</option>
                        <option value="4">Tutor</option>
                    </select>

                    @if(isset($responsavel_animal))
                        @if($responsavel_animal->tipo_responsavel == 1 or $responsavel_animal->tipo_responsavel== 2)
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.local_captura') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input placeholder="Local Captura" wire:model="ong_e_protetor.local_captura"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.local_tratamento') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input placeholder="Local Tratamento" wire:model="ong_e_protetor.local_tratamento"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.nome') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input placeholder="Nome" wire:model="ong_e_protetor.nome"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>

                            </div>
                            <div class="flex flex-col md:flex-row">
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="estado" required >
                                    <option value="" readonly="">Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                    @endforeach
                                </select>
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="municipio" required >
                                    <option value="" readonly="">Município</option>
                                    @foreach($municipios as $municipio)
                                        <option value="{{$municipio->id}}">{{$municipio->nome}}</option>
                                    @endforeach
                                </select>
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="bairro" required >
                                    <option value="" readonly="">Bairro</option>
                                    @foreach($bairros as $bairro)
                                        <option value="{{$bairro->id}}">{{$bairro->nome}}</option>
                                    @endforeach
                                </select>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.endereco') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Endereço" wire:model="ong_e_protetor.endereco"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.referencia') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Referência" wire:model="ong_e_protetor.referencia"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('ong_e_protetor.telefone') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Telefone" wire:model="ong_e_protetor.telefone"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                            </div>
                        @endif
                        @if($responsavel_animal->tipo_responsavel == 3 or $responsavel_animal->tipo_responsavel == 4)
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('proprietario_e_tutor.nome') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Nome" wire:model="proprietario_e_tutor.nome"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="estado" required >
                                    <option value="" readonly="">Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                    @endforeach
                                </select>
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="municipio" required >
                                    <option value="" readonly="">Município</option>
                                    @foreach($municipios as $municipio)
                                        <option value="{{$municipio->id}}">{{$municipio->nome}}</option>
                                    @endforeach
                                </select>
                                <select class="mx-2 flex-1 h-10 mt-2 form-select  w-full"  wire:model="bairro" required >
                                    <option value="" readonly="">Bairro</option>
                                    @foreach($bairros as $bairro)
                                        <option value="{{$bairro->id}}">{{$bairro->nome}}</option>
                                    @endforeach
                                </select>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('proprietario_e_tutor.endereco') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Endereço" wire:model="proprietario_e_tutor.endereco"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('proprietario_e_tutor.referencia') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Referência" wire:model="proprietario_e_tutor.referencia"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                                <div class="w-full flex-1 mx-2">
                                    <div class="@error('proprietario_e_tutor.telefone') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                        <input required placeholder="Telefone" wire:model="proprietario_e_tutor.telefone"
                                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Ocorrência
                    {{--                    <div class="text-xs font-normal leading-none text-gray-500">Your billing address</div>--}}
                </div>
                <div class="flex-1">


                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Data da ocorrência </label>
                    <div class="w-full flex-1 mx-2">
                        <div class="@error('ocorrencia.data_ocorrencia') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input wire:model="ocorrencia.data_ocorrencia"  type="date"
                                   class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                    </div>

                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Data de inicio do tratamento</label>
                    <div class="w-full flex-1 mx-2">
                        <div class="@error('ocorrencia.data_inicio_tratamento') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input wire:model="ocorrencia.data_inicio_tratamento" type="date"
                                   class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                    </div>

                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Diagnóstico Clínico?</label>
                    <select wire:model="ocorrencia.is_diagnostico_clinico" class="@error('ocorrencia.is_diagnostico_clinico') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select  w-full">
                        <option value="">Selecione uma opção</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>

                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Laboratorial</label><span style="font-size: 10px">Segure CTRL para selecionar vários.</span>
                    <select  multiple multiple="multiple" style='overflow:hidden' size='3' wire:model="laboratoriais" class="@error('laboratoriais') border-red-900 @enderror mx-2 flex-1 mt-2 form-select  w-full">
                        <option value="1">Citológico</option>
                        <option value="2">Histopatológico</option>
                        <option value="3">Cultura</option>
                    </select>

                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Primeira vez com a doença?</label>
                    <select wire:model="ocorrencia.is_primeira_vez_doenca" class="@error('ocorrencia.is_primeira_vez_doenca') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select  w-full">
                        <option value="">Selecione uma opção</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                    <hr class="mt-2 @error('ocorrencia_lesoes') border-red-800 @enderror ">
                    <div class="flex flex-col md:flex-row">
                        <div class=" flex-initial  w-64 m-3 font-bold h-6 mx-2 mt-3 @error('ocorrencia_lesoes')text-red-900 @else text-gray-800 @enderror">Lesões</div>
                        <div class="flex-initial m-3">
                            <button class="text-sm  mx-2 w-32  focus:outline-none flex justify-center rounded font-bold cursor-pointer hover:bg-teal-700 hover:text-teal-100 bg-teal-100
                                text-teal-700
                                border duration-200 ease-in-out
                                border-teal-600 transition" wire:click="add_lesao()">Adicionar lesão</button>
                        </div>
                    </div>

                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Fotos</label>


                    @foreach($ocorrencia_lesoes as $key => $lesao)
                        <div class="w-full flex-1 mx-2">

                            <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                <div class="flex ">
                                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">Local da lesão</span>
                                </div>
                                <input wire:model="ocorrencia_lesoes.{{$key}}.local_lesao" type="text" class="@error('ocorrencia_lesoes.*.local_lesao') border-red-900 @enderror flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" >
                                <div class="flex ml-2 ">
                                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">Número de lesões</span>
                                </div>
                                <input  wire:model="ocorrencia_lesoes.{{$key}}.numero_lesoes" type="number" class="@error('ocorrencia_lesoes.*.numero_lesoes') border-red-900 @enderror flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" >

                                <div class="flex">
                                    <button class="text-sm items-center  mx-2 w-32  focus:outline-none flex justify-center rounded font-bold cursor-pointer hover:bg-red-700 hover:text-red-100 bg-red-100
                                text-red-600
                                border duration-200 ease-in-out
                                border-red-600 transition" wire:click="remove_lesao({{$key}})">Remover</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="w-full flex-1 mx-2 ">
                        <input type="file" multiple wire:model="fotos_ocorrencia">
                        @error('fotos_ocorrencia.*') <span class="error">Arquivo não permitido</span> @enderror
                        @error('fotos_ocorrencia') <span class="error"></span> @enderror
                    </div>

                    <hr class="mt-2 @error('ocorrencia_lesoes') border-red-800 @enderror">


                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Protocolo inicial instituido</label>
                    <select wire:model="ocorrencia.protocolo_inicial" class="@error('ocorrencia.protocolo_inicial') border-red-900 @enderror mx-2 flex-1 h-10 mt-2 form-select  w-full">
                        <option value="">Selecione uma opção</option>
                        <option value="1">Itraconazol</option>
                        <option value="2">Itraconazol + Iodeto de Potássio</option>
                        <option value="3">Anfotericona B</option>
                        <option value="0">Outros</option>
                    </select>

                    @if($ocorrencia->protocolo_inicial == '0')
                        <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Informe o protocolo inicial instituido</label>
                        <div class="w-full flex-1 mx-2">
                            <div class="@error('ocorrencia.outros_protocolos') border-red-900 @enderror my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <textarea wire:model="ocorrencia.outros_protocolos" type="number"
                                              class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></textarea></div>
                        </div>
                    @endif



                    <!-- using two similar templates for simplicity in js code -->
                    <template id="file-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                            <article tabindex="0"
                                     class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                <img alt="upload preview"
                                     class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed"/>

                                <section
                                    class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                    <div class="flex">
              <span class="p-1 text-blue-800">
                <i>
                  <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                       height="24" viewBox="0 0 24 24">
                    <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z"/>
                  </svg>
                </i>
              </span>
                                        <p class="p-1 size text-xs text-gray-700"></p>
                                        <button
                                            class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24">
                                                <path class="pointer-events-none"
                                                      d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </section>
                            </article>
                        </li>
                    </template>

                    <template id="image-template">
                        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                            <article tabindex="0"
                                     class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                <img alt="upload preview"
                                     class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"/>

                                <section
                                    class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1"></h1>
                                    <div class="flex">
              <span class="p-1">
                <i>
                  <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24"
                       height="24" viewBox="0 0 24 24">
                    <path
                        d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/>
                  </svg>
                </i>
              </span>

                                        <p class="p-1 size text-xs"></p>
                                        <button
                                            class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24">
                                                <path class="pointer-events-none"
                                                      d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </section>
                            </article>
                        </li>
                    </template>
                </div>
            </div>
            <div class="flex flex-col md:flex-row ">
                <div class="w-64 mx-2 font-bold h-6 mt-3 text-gray-800"></div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <button class="text-sm  mx-2 w-32  focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
        hover:bg-teal-700 hover:text-teal-100
        bg-teal-100
        text-teal-700
        border duration-200 ease-in-out
        border-teal-600 transition" wire:click="create()">Cadastrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if(session()->get('message'))
    <div id="message" class="fixed right-20 bottom-0  bg-green-400 border-t-4 border-green-600 rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
        <div class="flex">
            <svg class="h-6 w-6 text-green-400 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
            <div>
                <p class="font-bold">{{session()->get('message')}}</p>
                <button class="text-sm inline right-0 mx-2 w-32  focus:outline-none block justify-center px-4 py-2 rounded font-bold cursor-pointer
        hover:bg-teal-700 hover:text-teal-100
        bg-teal-100
        text-teal-700
        border duration-200 ease-in-out
        border-teal-600 transition"><a href="/dashboard">Voltar</a></button>
            </div>
        </div>
    </div>
    @endif


    <style>
        .hasImage:hover section {
            background-color: rgba(5, 5, 5, 0.4);
        }

        .hasImage:hover button:hover {
            background: rgba(5, 5, 5, 0.45);
        }

        #overlay p,
        i {
            opacity: 0;
        }

        #overlay.draggedover {
            background-color: rgba(255, 255, 255, 0.7);
        }

        #overlay.draggedover p,
        #overlay.draggedover i {
            opacity: 1;
        }

        .group:hover .group-hover\:text-blue-800 {
            color: #2b6cb0;
        }
    </style>
</div>
