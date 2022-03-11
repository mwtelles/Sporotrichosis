<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Notificações</div>
                            <div class="font-bold text-lg">{{$user->ocorrencias()->count()}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="max-w-7xl my-2 mx-auto sm:px-6 lg:px-8">
            <livewire:admin.users.edit :user="$user"></livewire:admin.users.edit>
        </div>
    </div>
</x-app-layout>
