<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Notificação') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <livewire:notificacao.show :ocorrencia="App\Models\Ocorrencia::find($notificacao)"></livewire:notificacao.show>
        </div>
    </div>
</x-app-layout>
