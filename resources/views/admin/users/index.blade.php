<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
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
    <div class="py-12">
        <div class=" m-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('admin.users.create')}}"
               type="button"
               class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
            ><i class="fas fa-plus"></i> Cadastrar</a>



            <div class="grid grid-cols-12 gap-4 m-2">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Usuários cadastrados</div>
                            <div class="font-bold text-lg">{{\App\Models\User::count()}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--            <a href="{{route('notificacao.create')}}"--}}
{{--               type="button"--}}
{{--               class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"--}}
{{--            ><i class="fas fa-plus"></i> Nova Notificação</a>--}}

            <div class="relative float-right my-2">
                <form>
                    <input name="search" type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Procurar usuário">
                    <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                    <a href="/users" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                        <i class="fas fa-redo"></i>
                        Limpar
                    </a>
                </form>
            </div>
            <h3 class="font-semibold m-2 text-xl leading-tight sm:leading-normal"Usuários</h3>
            <div class="p-2">
                <div class=" container">
                    <table
                        class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-white">
                        @foreach($users as $user)
                            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left">Código</th>
                                <th class="p-3 text-left">Nome</th>
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-left">Ações</th>
                            </tr>
                        @endforeach
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                        @foreach($users as $user)
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    #{{$user->id}}
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    {{$user->name}}
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    {{$user->email}}
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    @if($user->status)
                                        <span type="button" class="border-grey-light border hover:bg-gray-100 p-3 text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer">
                                            Ativo
                                        </span>
                                    @else
                                        <span type="button" class="border-grey-light border hover:bg-gray-100 p-3 text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer">
                                            Desativado
                                        </span>
                                    @endif
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3 text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer">
                                    <button class="bg-blue-900 rounded p-2 text-white"><a href="users/{{$user->id}}">Visualizar</a></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>

            </div></div>
    </div>
</x-app-layout>
