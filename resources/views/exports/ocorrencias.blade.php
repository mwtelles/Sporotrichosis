
<table class="min-w-full leading-normal">
    <thead>
    <tr>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Número de Protocolo
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Data da ocorrência
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Animal
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Espécie
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Sexo
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Castrado
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Município
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Bairro
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Endereço
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Telefone
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Laboratorial
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Primeira vez com doença
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Primeira vez com doença
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Data da Ocorrência
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Data de inicio do tratamento
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Protocolo inicial Instituido
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Quantidade de Retornos
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Responsável
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            Cadastrado por
        </th>

    </tr>
    </thead>
    <tbody>
    @foreach($ocorrencias as $ocorrencia)
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            #{{$ocorrencia->id}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{date('d/m/Y',strtotime($ocorrencia->data_ocorrencia))}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->animal->nome}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->animal->especie_string()}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->animal->sexo_string()}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->animal->is_castrado_string()}}
                        </p>
                    </div>
                </div>
            </td>

            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            @php
                                $responsavel = null;

                            if($ocorrencia->animal->responsavel_animal->tipo_responsavel <=2){
                                $responsavel = $ocorrencia->animal->responsavel_animal->ong_e_protetor;
                            }else{
                                $responsavel = $ocorrencia->animal->responsavel_animal->proprietario_e_tutor;
                            }
                            @endphp
                            {!! $responsavel->municipio->nome !!}
                        </p>
                    </div>
                </div>
            </td><td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$responsavel->bairro->nome}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$responsavel->endereco}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$responsavel->telefone}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->is_diagnostico_clinico_string()}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            @foreach($ocorrencia->laboratoriais as $laboratorial)
                                |{{$laboratorial->laboratorial_string()}}|
                                @endforeach
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->is_primeira_vez_doenca_string()}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{date('d/m/Y',strtotime($ocorrencia->data_ocorrencia))}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{date('d/m/Y',strtotime($ocorrencia->data_inicio_tratamento))}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->protocolo_inicial_string()}}
                        </p>
                    </div>
                </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div class="flex items-center">

                    <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$ocorrencia->retornos->count()}}
                        </p>
                    </div>
                </div>
            </td>

            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                    @if($ocorrencia->animal->responsavel_animal->tipo_responsavel < 3 )
                        Ong/ Protetor
                    @else
                        Proprietário/ Tutor
                    @endif
                </p>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                    {{$ocorrencia->user->name}}
                </p>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
