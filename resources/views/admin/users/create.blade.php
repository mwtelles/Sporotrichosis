<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl my-2 mx-auto sm:px-6 lg:px-8">
            <livewire:admin.users.create :user="$user"></livewire:admin.users.create>
        </div>
    </div>
</x-app-layout>
