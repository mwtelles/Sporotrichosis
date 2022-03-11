<div class="bg-white shadow rounded-lg p-6">
    <form action="{{route('admin.estados.store')}}" method="POST">
        @csrf
        <div class="grid lg:grid-cols-2 gap-6">

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="sigla" class="bg-white text-gray-600 px-1">Sigla</label>
                    </p>
                </div>
                <p>
                    <input required id="sigla" name="sigla" autocomplete="false" tabindex="0" type="text" maxlength="2"
                           class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>

            <button type="submit"
                class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                Cadastrar
            </button>

        </div>
    </form>

</div>
