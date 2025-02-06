<x-app-layout>
    @section('title', '- Convenios')
    <!-- Banner con imagen fijo -->
    <section
        class="h-screen text-center text-white bg-cover bg-center bg-no-repeat banner flex items-center justify-center"
        style="height: 25vh; background-image: url(https://www.fecervunion.com/wp-content/uploads/2024/05/Slide-Nuestros-Convenios.jpg);">
        {{-- <div class="container mx-auto px-4">
            <h1 class="text-5xl font-bold mb-4">Bienvenidos a Nuestra Empresa</h1>
            <p class="text-2xl">Descubre más sobre nuestra historia y nuestros valores.</p>
        </div> --}}
    </section>
    <!-- Sección de Introducción -->
    <section class="convenios p-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <h1 class="text-3xl font-bold mb-4 text-blue-600">HISTORIAL DE CONVENIOS</h1>
        <p class="mb-8 text-lg">Convenios firmados con Municipalidades que contribuyen al desarrollo y bienestar de la
            comunidad.</p>

        <!-- Listado de Convenios -->
        <div class="convenios-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> <!-- Cambiado a 4 columnas -->

            <!-- Tarjeta del Convenio 1 -->
            <div class="convenio-card bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer overflow-hidden"
                onclick="openModal('card1')"> <!-- Eliminados los bordes redondeados -->
                <img src="https://elcomercio.pe/resizer/3DlYVEyb0D_cmV9kQ70ihH3njdI=/620x0/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/A544ZDY7MZADREPWAUZFCURFBI.jpg"
                    alt="Encabezado del Convenio" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-blue-600 text-xl font-semibold mb-2">Municipalidad Distrital de Cajaruro - Amazonas
                    </h2>
                    <p class="text-gray-600 mb-1"> Convenio Interinstitucional de Proyección Social </p>
                    <p class="text-gray-600 mb-1"><strong>Periodo:</strong> 2021</p>
                    <p class="text-gray-600 mb-1"><strong>Estado:</strong> <span
                            class="text-red-500 font-medium">Culminado</span></p>
                </div>
            </div>
            <!-- Tarjeta del Convenio 1 -->
            <div class="convenio-card bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer overflow-hidden"
                onclick="openModal('card2')"> <!-- Eliminados los bordes redondeados -->
                <img src="{{ asset('image/muni-peca.png') }}" alt="Encabezado del Convenio"
                    class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-blue-600 text-xl font-semibold mb-2">Municipalidad Distrital de La Peca - Amazonas
                    </h2>
                    <p class="text-gray-600 mb-1"> Convenio Interinstitucional de Proyección Social
                    <p class=" text-gray-600 mb-1"><strong>Periodo:</strong> 2022</p>
                    </p>
                    <p class="text-gray-600 mb-1"><strong>Estado:</strong> <span
                            class="text-red-500 font-medium">Culminado</span></p>
                </div>
            </div>



            <!-- Tarjeta del Convenio 3 -->
            <div class="convenio-card bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer overflow-hidden"
                onclick="openModal('card3')"> <!-- Eliminados los bordes redondeados -->
                <img src="https://i.ytimg.com/vi/m-StNxWczPI/maxresdefault.jpg" alt="Encabezado del Convenio"
                    class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-blue-600 text-xl font-semibold mb-2">Municipalidad Provincial de Santa Cruz -
                        Cajamarca</h2>
                    <p class="text-gray-600 mb-1"> Convenio Interinstitucional de Proyección Social</p>
                    <p class="text-gray-600 mb-1"><strong>Periodo:</strong> 2022</p>
                    <p class="text-gray-600 mb-1"><strong>Estado:</strong> <span
                            class="text-red-500 font-medium">Culminado</span></p>
                </div>
            </div>


            <!-- Agrega más tarjetas según sea necesario -->
        </div>
    </section>


    <!-- Modal -->
    <div id="modal-convenio" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 md:w-1/3">
            <div class="relative">
                <img id="modal-image" src="" alt="Imagen del Convenio"
                    class="w-full h-auto max-h-80 object-contain mx-auto">
            </div>
            <div class="p-6">
                <h2 id="modal-municipalidad" class="text-2xl font-semibold mb-2"></h2>
                <p id="modal-descripcion" class="mb-4 text-justify"></p>
                <p class="mb-4"><strong>Periodo:</strong> <span id="modal-fecha"></span></p>
                <p class="mb-4"><strong>Alcande:</strong> <span id="modal-alcalde"></span></p>
                <p class="mb-4"><strong>Estado:</strong> <span id="modal-estado" class="text-red-500 font-medium"></span></p>
                <button onclick="closeModal()" class="mt-4 bg-blue-500 text-white rounded-lg px-4 py-2">Cerrar</button>
            </div>
        </div>
    </div>





    <script>
        function openModal(card) {
            let municipalidad, fecha, descripcion, estado, imageUrl;

            switch (card) {
                case 'card1':
                    municipalidad = "Municipalidad Distrital de Cajaruro - Amazonas";
                    fecha = "2021";
                    descripcion = "Este proyecto benefició a 300 estudiantes de educación secundaria y a 150 maestros del distrito en mención. Tuvo una duración de 3 meses y los resultados que se obtuvieron fueron los esperados (Ingresantes a universidades nacionales, privadas e institutos superiores) ";
                    estado = "Culminado";
                    alcalde = "Hildebrando Tineo Díaz";
                    imageUrl =
                        "https://elcomercio.pe/resizer/3DlYVEyb0D_cmV9kQ70ihH3njdI=/620x0/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/A544ZDY7MZADREPWAUZFCURFBI.jpg"; // Cambia esto por la imagen real
                    break;
                case 'card2':
                    municipalidad = "Municipalidad Distrital de La Peca - Amazonas";
                    fecha = "2022";
                    descripcion = "Este proyecto educativo benefició a 350 de educación secundaria, a 150 estudiantes preuniversitarios y a 200 maestros del distrito en mención. Tuvo una duración de 3 meses y los resultados que se obtuvieron fueron los esperados (Ingresantes a universidades nacionales, privadas, institutos superiores y policía nacional)";
                    estado = "Culminado";
                    alcalde = "Fidel Jara Cabrera";
                    imageUrl = "{{ asset('image/muni-peca.png') }}"; // Cambia esto por la imagen real
                    break;
                case 'card3':
                    municipalidad = "Municipalidad Provincial de Santa Cruz - Cajamarca";
                    fecha = "2022";
                    descripcion = "Este proyecto benefició con media beca de estudio a 250 estudiantes de educación secundaria y a 100 estudiantes preuniversitarios. Tuvo una duración de 3 meses y los resultados que se obtuvieron fueron los esperados (Ingresantes a universidades nacionales, privadas, institutos superiores)";
                    estado = "Culminado";
                    alcalde = "Marino Díaz Alarcón";
                    imageUrl = "https://i.ytimg.com/vi/m-StNxWczPI/maxresdefault.jpg"; // Cambia esto por la imagen real
                    break;
                    // Agrega más casos según las tarjetas que tengas
                default:
                    return; // Si no hay coincidencia, salir de la función
            }

            // Asignar la información al contenido del modal
            document.getElementById('modal-municipalidad').innerText = municipalidad;
            document.getElementById('modal-descripcion').innerText = descripcion; // Usar la descripción directamente
            document.getElementById('modal-fecha').innerText = fecha;
            document.getElementById('modal-estado').innerText = estado;
            document.getElementById('modal-alcalde').innerText = alcalde;
            document.getElementById('modal-image').src = imageUrl; // Asignar la imagen al modal

            // Mostrar el modal
            document.getElementById('modal-convenio').classList.remove('hidden');
        }

        function closeModal() {
            // Ocultar el modal
            document.getElementById('modal-convenio').classList.add('hidden');
        }
    </script>




</x-app-layout>
