<x-app-layout>
    @section('title', '- Ciclos')

    <section
        class="h-screen text-center text-white bg-cover bg-center bg-no-repeat banner flex items-center justify-center"
        style="height: 25vh; background-image: url(https://i1.wp.com/aduni.edu.pe/wp-content/uploads/2022/02/Banner-Anual-San-Marcos.jpg?w=1262&ssl=1);">      
    </section>



    <section class="py-16 p-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto px-4">
        <!-- Título de la sección -->
        <h2 class="text-4xl font-bold text-blue-600 mb-5 bg-yellow-300 p-2 rounded-lg text-center">NUESTROS CICLOS</h2>

        <!-- Ciclo Escolar -->
        <div class="bg-white rounded-lg shadow-lg mb-5 transition transform hover:-translate-y-0.5 hover:shadow-xl">
            <!-- Contenido completo -->
            <div class="p-4 w-full">
                <!-- Encabezado azul con texto blanco -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg px-4 py-2 flex items-center">
                    <h3 class="text-3xl font-semibold text-white">Escolar</h3>
                </div>
                <!-- Línea separadora -->
                <div class="border-t border-gray-200 my-4"></div>

                <!-- Puntos en 2 columnas y la imagen abajo en móvil -->
                <div class="flex flex-col lg:flex-row px-5">
                    <!-- Puntos -->
                    <div class="w-full lg:w-2/3 grid grid-cols-2 gap-4 text-gray-600 leading-loose">
                        <div><i class="fa-solid fa-calendar-days"></i> <strong>Duración:</strong> 10 Semanas</div>
                        <div class="relative"><i class="fa-solid fa-book"></i>
                            <strong>Temario:</strong>
                            <button id="temario-escolar"
                                class="bg-blue-500 text-white rounded-full px-3 py-1 text-sm ml-2 hover:bg-blue-600 focus:outline-none">10
                                Cursos</button>
                        </div>
                        <div><i class="fa-solid fa-chalkboard-user"></i> Asesoramiento de trabajos escolares</div>
                        <div><i class="fa-solid fa-globe"></i> Sesiones online</div>
                        <div><i class="fa-solid fa-video"></i> Sesiones grabadas disponibles</div>
                        <div><i class="fa-solid fa-book-bookmark"></i> Biblioteca virtual</div>
                        <div><i class="fa-solid fa-list"></i> Exámenes de avance</div>
                        <div><i class="fa-brands fa-whatsapp"></i> Grupo de whatsapp</div>
                        <div><i class="fa-solid fa-square-root-variable"></i> Grupo de Mate-Básica</div>
                    </div>

                    <!-- Imagen -->
                    <div class="w-full lg:w-1/3 flex items-center justify-center mt-5 lg:mt-0">
                        <img src="{{ asset('image/escolar.jpg') }}" alt="Imagen del ciclo escolar"
                            class="rounded-lg shadow-lg w-full h-auto">
                    </div>
                </div>
            </div>
        </div>

        <!-- Ciclo Preuniversitario -->
        <div class="bg-white rounded-lg shadow-lg transition transform hover:-translate-y-0.5 hover:shadow-xl">
            <!-- Contenido completo -->
            <div class="p-4 w-full">
                <!-- Encabezado azul con texto blanco -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg px-4 py-2 flex items-center">
                    <h3 class="text-3xl font-semibold text-white">Preuniversitario</h3>
                </div>

                <!-- Línea separadora -->
                <div class="border-t border-gray-200 my-4"></div>

                <!-- Puntos en 2 columnas y la imagen abajo en móvil -->
                <div class="flex flex-col lg:flex-row px-5">
                    <!-- Puntos -->
                    <div class="w-full lg:w-2/3 grid grid-cols-2 gap-4 text-gray-600 leading-loose">
                        <div><i class="fa-solid fa-calendar-days"></i> <strong>Duración:</strong> 12 Semanas</div>
                        <div class="relative"><i class="fa-solid fa-book"></i>
                            <strong>Temario:</strong>
                            <button id="temario-preuniversitario"
                                class="bg-blue-500 text-white rounded-full px-3 py-1 text-sm ml-2 hover:bg-blue-600 focus:outline-none">17
                                Cursos</button>
                        </div>
                        <div><i class="fa-solid fa-graduation-cap"></i> Seminarios adicionales al horario formal
                        </div>
                        <div><i class="fa-solid fa-globe"></i> Sesiones online</div>
                        <div><i class="fa-solid fa-video"></i> Sesiones Grabadas</div>
                        <div><i class="fa-solid fa-book-bookmark"></i> Biblioteca Virtual</div>
                        <div><i class="fa-solid fa-list"></i> Exámenes de avance</div>
                        <div><i class="fa-brands fa-whatsapp"></i> Grupo de Whatsapp</div>
                        <div><i class="fa-solid fa-user-group"></i> Grupo de nivel avanzado</div>
                    </div>

                    <!-- Imagen -->
                    <div class="w-full lg:w-1/3 flex items-center justify-center mt-5 lg:mt-0">
                        <img src="{{ asset('image/preuniversitario.png') }}" alt="Imagen del ciclo preuniversitario"
                            class="rounded-lg shadow-lg w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









    <!-- Modal para Temario Escolar -->
    <div id="modal-temario-escolar"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Cursos de Escolar</h2>
            <ul class="list-disc list-inside mb-4">
                <li>Habilidad Matemática</li>
                <li>Habilidad Verbal</li>
                <li>Lenguaje</li>
                <li>Historia del Perú</li>
                <li>Geografía</li>
                <li>Álgebra</li>
                <li>Biología</li>
                <li>FÍsica</li>
                <li>Psicología y Filosofía</li>
                <li>Economía y Cívica</li>
            </ul>
            <button class="bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-600"
                onclick="closeModal('modal-temario-escolar')">Cerrar</button>
        </div>
    </div>

    <!-- Modal para Temario Preuniversitario -->
    <div id="modal-temario-preuniversitario"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold text-indigo-600 mb-4">Cursos de Preuniversitario</h2>
            <ul class="list-disc list-inside mb-4">
                <li>Habilidad Matemática</li>
                <li>Habilidad Verbal</li>
                <li>Lenguaje</li>
                <li>Literatura</li>
                <li>Historia del Perú</li>
                <li>Historia Universal</li>
                <li>Geografía</li>
                <li>Álgebra</li>
                <li>Biología</li>
                <li>FÍsica</li>
                <li>Anatomía</li>
                <li>Química</li>
                <li>Psicología y Filosofía</li>
                <li>Economía y Cívica</li>
                <li>Geometría</li>
                <li>Trigonometría</li>
            </ul>
            <button class="bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-600"
                onclick="closeModal('modal-temario-preuniversitario')">Cerrar</button>
        </div>
    </div>

    <script>
        // Función para abrir el modal
        document.getElementById('temario-escolar').onclick = function() {
            document.getElementById('modal-temario-escolar').classList.remove('hidden');
        };

        document.getElementById('temario-preuniversitario').onclick = function() {
            document.getElementById('modal-temario-preuniversitario').classList.remove('hidden');
        };

        // Función para cerrar el modal
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</x-app-layout>
