<div class="bg-white shadow rounded-lg p-6">
    <form action="{{route('admin.bairros.store')}}" method="POST">
        @csrf
        <div class="grid lg:grid-cols-4 gap-6">
            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">

                <select onchange="getMunicipios()" id="estado_id" required name="estado_id" style="width: 100%; height: 100%">
                    <option readonly="" value="null">Selecione um estado</option>

                    @foreach(\App\Models\Estado::all() as $estado)
                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                    @endforeach
                </select>
            </div>

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">

                <select id="municipio_id" required name="municipio_id" style="width: 100%; height: 100%">

                </select>
            </div>

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="nome" class="bg-white text-gray-600 px-1">Nome</label>
                    </p>
                </div>
                <p>
                    <input required id="nome" name="nome" autocomplete="false" tabindex="0" type="text"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script>
    function getMunicipios(){
        $('#municipio_id').html('<option>Selecione um municipio</option>');
        let estado = $('#estado_id').val();
        $.ajax({
            url: '/municipios/estado/'+estado,
            method:'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                data.forEach(function( municipio ) {
                    $('#municipio_id').append("<option value='"+municipio.id+"'>"+municipio.nome+"</option>");
                });
            }
        })
    }
</script>
