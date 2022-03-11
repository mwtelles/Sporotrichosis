<div>
    <style>
        @foreach($retornos as $key_retorno => $retorno)
            @foreach($retorno->fotos as $key=>$foto)
                .image{{$key_retorno.'-'.$key}} {
                content: url({{Storage::url($foto->imagem, 'public')}})
                }
            @endforeach
        @endforeach
    </style>

    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>

    <div class="flex flex-col md:flex-row pb-4 mb-4 border-b border-gray-200">
        <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Retorno do animal
        </div>
        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">
            <table class="border-collapse w-full">
                <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Data</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Novo estado</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Descrição</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Fotos</th>
                </tr>
                </thead>
                <tbody>
                @foreach($retornos as $key_retorno => $retorno)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{date('d/m/Y',strtotime($retorno->data))}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            {{$retorno->novo_estado_string()}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            {{$retorno->descricao}}
                        </td>

                        <td class="w-full lg:w-auto  p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <div class="flex flex-col items-center">
                                        <div class="swiper max-h-72  flex overflow-x-scroll w-100 ">
                                            @foreach($retorno->fotos as $key=>$foto)
                                                <div onclick="openModal('{{$foto->imagem}}')" >
                                                    <img  class="image{{$key_retorno.'-'.$key}} descriptionn h-24 opacity-50 hover:opacity-100 cursor-pointer" src="#" >
                                                </div>
                                            @endforeach

                                    </div>
                                </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
             style="background: rgba(0,0,0,.7);">
            <div
                class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Imagem do retorno</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                    <div class="my-5" id="body-modal">

                    </div>
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.querySelector('.main-modal');
        const closeButton = document.querySelectorAll('.modal-close');

        const modalClose = () => {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }

        function openModal(e){
            console.log(e);
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
            document.getElementById('body-modal').innerHTML = '<img src="/storage/'+e+'">';
        }

        for (let i = 0; i < closeButton.length; i++) {

            const elements = closeButton[i];

            elements.onclick = (e) => modalClose();

            modal.style.display = 'none';

            window.onclick = function (event) {
                if (event.target == modal) modalClose();
            }
        }
    </script>

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
            var dots = document.getElementsByClassName("descriptionn");
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
