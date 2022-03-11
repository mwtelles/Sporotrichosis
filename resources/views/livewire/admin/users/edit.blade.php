<div>
    <section class=" bg-gray-100  bg-opacity-50 h-screen">
        <div class="mx-auto container   shadow-md">
            <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                <div class="max-w-sm mx-auto md:w-full md:mx-0">
                    <div class="inline-flex items-center space-x-4">
                        <img
                            class="w-10 h-10 object-cover rounded-full"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>

                        <h1 class="text-gray-600">{{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="bg-white space-y-6">
                <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 max-w-sm mx-auto">Conta</h2>
                    <div class="md:w-2/3 max-w-sm mx-auto">
                        <div>
                            <label class="text-sm text-gray-400">Email</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                    <svg
                                        fill="none"
                                        class="w-6 text-gray-400 mx-auto"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="email"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    wire:model="user.email"
                                />
                            </div>
                            <div>
                                <label class="text-sm text-gray-400">Função</label>
                                <div class="w-full inline-flex border">
                                    <select wire:model="user.type" style="width: inherit">
                                        <option value="0" @if($user->type == 0) selected @endif>Usuário comum</option>
                                        <option value="1" @if($user->type == 0) selected @endif>Administrador</option>
                                        <option value="2" @if($user->type == 2) selected @endif>Prefeitura</option>
                                    </select>
                                </div>
                            </div>

                            @if($user['type'] == 0)
                                <div>
                                    <label class="text-sm text-gray-400">CRMV</label>
                                    <div class="w-full inline-flex border @error('user.crmv') border-red-900 @enderror">
                                        <input
                                            type="text"
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                            wire:model="user.crmv"
                                        />
                                    </div>
                                </div>

                            @endif

                            <div>
                                <label class="text-sm text-gray-400">Estado</label>
                                <select wire:model="estado"
                                        class="w-full inline-flex border "
                                        required>
                                    @foreach( $estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="text-sm text-gray-400">Município</label>
                                <select class="w-full inline-flex border "  wire:model="municipio" required >
                                    @foreach( $municipios as $municipio)
                                        <option value="{{$municipio->id}}" @if($user->municipio->id == $municipio->id) selected @endif >{{$municipio->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Informações pessoais</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label class="text-sm text-gray-400">Nome completo</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg
                                        fill="none"
                                        class="w-6 text-gray-400 mx-auto"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    wire:model="user.name"
                                />
                            </div>
                        </div>

                    </div>
                </div>


                <hr />

                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm">Segurança</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label class="text-sm text-gray-400">Alterar Senha</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg
                                        fill="none"
                                        class="w-6 text-gray-400 mx-auto"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                                    wire:model="password"
                                />
                            </div>
                        </div>

                    </div>
                </div>


                <hr />
                @if($saved)
                <div class="bg-green-100 rounded-md p-3  inline-flex">
                    <svg
                        class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
                        viewBox="0 0 24 24"
                        fill="none"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                    >
                        <path d="M0 0h24v24H0z" stroke="none" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2 4-4" />
                    </svg>

                    <div class="text-green-700">
                        <div class="font-bold text-xl">{{$saved}}</div></div>
                </div>
                @endif
                <div class=" p-4 text-right text-gray-500">
                    <button wire:click="save" class="inline-flex items-center focus:outline-none mr-4  bg-blue-900 rounded p-2 text-white">Salvar</button>
                    @if($user->status)
                    <button wire:click="block" class="inline-flex items-center focus:outline-none mr-4 bg-red-500 rounded p-2 text-white">
                        Desativar conta
                    </button>
                    @else
                        <button wire:click="unblock" class="inline-flex items-center focus:outline-none mr-4 bg-green-500 rounded p-2 text-white">
                            Ativar conta
                        </button>
                    @endif
                </div>
            </div>
        </div>

    </section>

</div>
