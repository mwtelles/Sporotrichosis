    <div>
        <style>
            @foreach($ocorrencia->fotos as $key=> $foto)
            .image{{$key}} {
                content: url({{Storage::url($foto->extensao, 'public')}})
            }
            @endforeach
        </style>

        <div>
            <div class="p-5">

                <div class="mt-2">
                    <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                        <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Usuário</div>
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Código de registro: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">#{{$animal->ocorrencia->user->id}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Nome:<span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->ocorrencia->user->name}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Email:<span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->ocorrencia->user->email}}</span></label>
                            @if(auth()->user()->type == 1)
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">
                                <a href="{{route('admin.users.show',$animal->ocorrencia->user->id)}}" class="ml-auto focus:outline-none bg-gray-700 cursor-pointer text-white hover:bg-gray-300 p-1 rounded-md hover:text-gray-800">Detalhes</a>
                            </label>
                                @endif
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                        <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Animal</div>
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Nome: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->nome}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Idade:<span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->anos}} {{($animal->anos > 1)?' anos':' ano'}} e {{$animal->meses}} {{($animal->meses > 1)?' meses':' mês'}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Espécie:<span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->especie_string()}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Sexo: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->sexo_string()}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Castrado: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->is_castrado_string()}}</span></label>


                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row pb-4 mb-4 border-b border-gray-200">
                        <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Responsável
                        </div>
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 row block">Responsável: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->tipo_responsavel_string()}}</span></label>

                                @if($animal->responsavel_animal->tipo_responsavel == 1 or $animal->responsavel_animal->tipo_responsavel== 2)
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Local de Captura: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->local_captura}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Local de Tratamento: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->local_tratamento}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Nome: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Município: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->municipio->estado->sigla}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Município: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->municipio->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Endereço: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->endereco}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Bairro: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->bairro->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Referencia: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->referencia}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Telefone: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->ong_e_protetor->telefone}}</span></label>
                                @endif
                                @if($animal->responsavel_animal->tipo_responsavel == 3 or $animal->responsavel_animal->tipo_responsavel == 4)
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Nome: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Estado: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->municipio->estado->sigla}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Município: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->municipio->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Endereço: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->endereco}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Bairro: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->bairro->nome}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Referencia: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->referencia}}</span></label>
                                <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Telefone: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->responsavel_animal->proprietario_e_tutor->telefone}}</span></label>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row pb-4 mb-4">
                        <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Ocorrência
                            {{--                    <div class="text-xs font-normal leading-none text-gray-500">Your billing address</div>--}}
                        </div>
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Diagnóstico Clínico:   <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->ocorrencia->is_diagnostico_clinico_string()}}</span></label>


                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Laboratorial:
                                @foreach($animal->ocorrencia->laboratoriais as $l)
                                <span class="mb-1 text-gray-900 bg-blue-100 text-white  rounded-full px-2  flex-1 h-10 mt-2">{{$l->laboratorial_string()}}</span>
                                @endforeach
                            </label>


                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Primeira vez com a doença? <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{$animal->ocorrencia->is_primeira_vez_doenca_string()}}</span></label>

                            <table class="border-collapse w-full">
                                <thead>
                                <tr>
                                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Local da lesão</th>
                                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Número de lesões</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($animal->ocorrencia->lesoes as $lesao)
                                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{$lesao->local_lesao}}</span>
                                        {{$lesao->local_lesao}}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{$lesao->numero_lesoes}}</span>
                                        {{$lesao->numero_lesoes}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <h1 class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Fotos: </h1>
                            <section class="mx-auto " style="max-width: 400px;margin-top: 20px;">
                                <div class="shadow-2xl relative">
                                    <!-- large image on slides -->
                                    @foreach($ocorrencia->fotos as $key=>$foto)
                                        <div class="mySlides hidden">
                                            <div class="image{{$key}} w-full object-cover"></div>
                                        </div>
                                @endforeach
                                <!-- butttons -->
                                    <a class="absolute left-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(-1)">❮</a>
                                    <a class="absolute right-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(1)">❯</a>

                                    <!-- image description -->
                                    <div class="text-center text-white font-light tracking-wider bg-gray-800 py-2">
                                        <p id="caption"></p>
                                    </div>

                                    <!-- smaller images under description -->
                                    <div class="flex">

                                        @foreach($ocorrencia->fotos as $key=>$foto)
                                            <div>
                                                <img class="image{{$key}} description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" onclick="currentSlide({{$key}})">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>

                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Data da ocorrência: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{date('d/m/Y',strtotime($animal->ocorrencia->data_ocorrencia))}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Data do inicio de tratamento: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{date('d/m/Y',strtotime($animal->ocorrencia->data_inicio_tratamento))}}</span></label>
                            <label class="mx-2 flex-1 h-10 mt-2 text-md text-gray-400 block">Protocolo inicial instituido: <span class="mb-1 text-gray-900  mx-2 flex-1 h-10 mt-2">{{($animal->ocorrencia->protocolo_inicial == 0)?$animal->ocorrencia->outros_protocolos:$animal->ocorrencia->protocolo_inicial_string()}}</span></label>


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


                </div>
                <livewire:retorno.create :animal="$animal"></livewire:retorno.create>
                <livewire:retorno.show :animal="$animal"></livewire:retorno.show>

            </div>

            {{--    <script>--}}
            {{--        const fileTempl = document.getElementById("file-template"),--}}
            {{--            imageTempl = document.getElementById("image-template"),--}}
            {{--            empty = document.getElementById("empty");--}}

            {{--        // use to store pre selected files--}}
            {{--        let FILES = {};--}}

            {{--        // check if file is of type image and prepend the initialied--}}
            {{--        // template to the target element--}}
            {{--        function addFile(target, file) {--}}
            {{--            const isImage = file.type.match("image.*"),--}}
            {{--                objectURL = URL.createObjectURL(file);--}}

            {{--            const clone = isImage--}}
            {{--                ? imageTempl.content.cloneNode(true)--}}
            {{--                : fileTempl.content.cloneNode(true);--}}

            {{--            clone.querySelector("h1").textContent = file.name;--}}
            {{--            clone.querySelector("li").id = objectURL;--}}
            {{--            clone.querySelector(".delete").dataset.target = objectURL;--}}
            {{--            clone.querySelector(".size").textContent =--}}
            {{--                file.size > 1024--}}
            {{--                    ? file.size > 1048576--}}
            {{--                    ? Math.round(file.size / 1048576) + "mb"--}}
            {{--                    : Math.round(file.size / 1024) + "kb"--}}
            {{--                    : file.size + "b";--}}

            {{--            isImage &&--}}
            {{--            Object.assign(clone.querySelector("img"), {--}}
            {{--                src: objectURL,--}}
            {{--                alt: file.name--}}
            {{--            });--}}

            {{--            empty.classList.add("hidden");--}}
            {{--            target.prepend(clone);--}}

            {{--            FILES[objectURL] = file;--}}
            {{--        }--}}

            {{--        const gallery = document.getElementById("gallery"),--}}
            {{--            overlay = document.getElementById("overlay");--}}

            {{--        // click the hidden input of type file if the visible button is clicked--}}
            {{--        // and capture the selected files--}}
            {{--        const hidden = document.getElementById("hidden-input");--}}
            {{--        document.getElementById("button").onclick = () => hidden.click();--}}
            {{--        hidden.onchange = (e) => {--}}
            {{--            for (const file of e.target.files) {--}}
            {{--                addFile(gallery, file);--}}
            {{--            }--}}
            {{--        };--}}

            {{--        // use to check if a file is being dragged--}}
            {{--        const hasFiles = ({dataTransfer: {types = []}}) =>--}}
            {{--            types.indexOf("Files") > -1;--}}

            {{--        // use to drag dragenter and dragleave events.--}}
            {{--        // this is to know if the outermost parent is dragged over--}}
            {{--        // without issues due to drag events on its children--}}
            {{--        let counter = 0;--}}

            {{--        // reset counter and append file to gallery when file is dropped--}}
            {{--        function dropHandler(ev) {--}}
            {{--            ev.preventDefault();--}}
            {{--            for (const file of ev.dataTransfer.files) {--}}
            {{--                addFile(gallery, file);--}}
            {{--                overlay.classList.remove("draggedover");--}}
            {{--                counter = 0;--}}
            {{--            }--}}
            {{--        }--}}

            {{--        // only react to actual files being dragged--}}
            {{--        function dragEnterHandler(e) {--}}
            {{--            e.preventDefault();--}}
            {{--            if (!hasFiles(e)) {--}}
            {{--                return;--}}
            {{--            }--}}
            {{--            ++counter && overlay.classList.add("draggedover");--}}
            {{--        }--}}

            {{--        function dragLeaveHandler(e) {--}}
            {{--            1 > --counter && overlay.classList.remove("draggedover");--}}
            {{--        }--}}

            {{--        function dragOverHandler(e) {--}}
            {{--            if (hasFiles(e)) {--}}
            {{--                e.preventDefault();--}}
            {{--            }--}}
            {{--        }--}}

            {{--        // event delegation to caputre delete events--}}
            {{--        // fron the waste buckets in the file preview cards--}}
            {{--        gallery.onclick = ({target}) => {--}}
            {{--            if (target.classList.contains("delete")) {--}}
            {{--                const ou = target.dataset.target;--}}
            {{--                document.getElementById(ou).remove(ou);--}}
            {{--                gallery.children.length === 1 && empty.classList.remove("hidden");--}}
            {{--                delete FILES[ou];--}}
            {{--            }--}}
            {{--        };--}}

            {{--        // print all selected files--}}
            {{--        document.getElementById("submit").onclick = () => {--}}
            {{--            alert(`Submitted Files:\n${JSON.stringify(FILES)}`);--}}
            {{--            console.log(FILES);--}}
            {{--        };--}}

            {{--        // clear entire selection--}}
            {{--        document.getElementById("cancel").onclick = () => {--}}
            {{--            while (gallery.children.length > 0) {--}}
            {{--                gallery.lastChild.remove();--}}
            {{--            }--}}
            {{--            FILES = {};--}}
            {{--            empty.classList.remove("hidden");--}}
            {{--            gallery.append(empty);--}}
            {{--        };--}}

            {{--    </script>--}}

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

        <script>
            //JS to switch slides and replace text in bar//
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("description");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" opacity-100", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " opacity-100";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>
    </div>
