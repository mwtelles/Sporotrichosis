<div>
    @if(auth()->user()->id == $animal->ocorrencia->user->id)
    <div class="flex  flex-col md:flex-row pb-4 mb-4">
        <button wire:click.prefetch="toggleCadastrando"
           type="button"
           class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
        > Cadastrar retorno</button>
    </div>
@endif
    @if(session()->get('message'))
        <div id="message" class="fixed right-20 bottom-0  bg-green-400 border-t-4 border-green-600 rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
            <div class="flex">
                <svg class="h-6 w-6 text-green-400 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                <div>
                    <p class="font-bold">{{session()->get('message')}}</p>
                </div>
            </div>
        </div>
    @endif

    @if($cadastrando)
    <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800">
        <div class="bg-white rounded-lg w-1/2">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="text-gray-900 font-medium text-lg">Cadastrar retorno do animal</div>
                    <svg wire:click.prefetch="toggleCadastrando" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                    </svg>
                </div>
                <hr class="border-1 w-full">
                <div class="flex-1 pb-4 mb-4">
                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Nova data</label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input wire:model="retorno_animal.data"  type="date"
                               class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "></div>
                </div>
                <div class="flex-1 pb-4 mb-4">
                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Estado</label>
                    <select wire:model="retorno_animal.novo_estado" class=" mx-2 flex-1 h-10 mt-2 form-select  w-full">
                        <option value="">Selecione uma opção</option>
                        <option value="0">Melhora das lesões </option>
                        <option value="1">Cura</option>
                        <option value="2">Agravamento dos sintomas</option>
                        <option value="3">Eutanásia </option>
                        <option value="4">Obito </option>
                        <option value="5">Outro </option>
                    </select>
                </div>
                <div class="flex-1 pb-4 mb-4">
                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Fotos</label>
                    <input wire:model="fotos_retorno_animal" type="file" accept="image/png,image/jpeg,image/jpg" multiple="multiple">
                    @error('fotos_retorno_animal') <span class="error">{{ $message }}</span> @enderror
                </div>
                <hr>
                <div class="flex-1 pb-4 mb-4">
                    <label class="mx-2 flex-1 h-10 mt-2 text-sm text-gray-400">Descrição</label>
                    <textarea rows="5" wire:model="retorno_animal.descricao" class="mx-2 flex-1 h-10 mt-2 form-select  w-full"></textarea>
                    @error('retorno_animal.descricao') <span class="error">{{ $message }}</span> @enderror
                </div>
                <hr>

                <div class="ml-auto">
                    @if($fotos_retorno_animal and isset($retorno_animal['data']) and isset($retorno_animal['novo_estado']))
                    <button wire:click="store" class="bg-blue-500 mx-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cadastrar
                    </button>
                    @endif
                    <button wire:click.prefetch="toggleCadastrando" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
        @endif

</div>
