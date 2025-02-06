<x-app-layout>

    <!-- Slider para PC -->
    <div id="slider-pc" class="relative w-full overflow-hidden">
        <div class="slides">
            <!-- Agrega tus imágenes aquí -->
            <div class="slide"><img src="{{ asset('image/banerPC.jpg') }}" alt="Slide 1"></div>
            <div class="slide"><img src="{{ asset('image/banerPC.jpg') }}" alt="Slide 2"></div>
            <div class="slide"><img src="{{ asset('image/banerPC.jpg') }}" alt="Slide 3"></div>
        </div>
        <button id="prev-pc" class="absolute left-0 top-1/2 -translate-y-1/2">&lt;</button>
        <button id="next-pc" class="absolute right-0 top-1/2 -translate-y-1/2">&gt;</button>
    </div>

    <!-- Slider para móvil -->
    <div id="slider-mobile" class="relative w-full overflow-hidden hidden">
        <div class="slides">
            <!-- Agrega tus imágenes aquí -->
            <div class="slide"><img src="{{ asset('image/banermovil.jpg') }}" alt="Slide 1"></div>
            <div class="slide"><img src="{{ asset('image/banermovil.jpg') }}" alt="Slide 2"></div>
            <div class="slide"><img src="{{ asset('image/banermovil.jpg') }}" alt="Slide 3"></div>
        </div>
        <button id="prev-mobile" class="absolute left-0 top-1/2 -translate-y-1/2">&lt;</button>
        <button id="next-mobile" class="absolute right-0 top-1/2 -translate-y-1/2">&gt;</button>
    </div>

    <!-- Servicios (Slider Manual) -->
    <section id="servicios" class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-5">TE OFRECEMOS</h2>

            <!-- Contenedor del Slider -->
            <div class="relative p-5 ">
                <!-- Contenedor de los servicios (deslizable) -->
                <div id="sliderContainer" class="flex overflow-x-hidden gap-8">
                    <!-- Servicio 1 -->
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/plataforma.jpg') }}" alt="Tutorías Personalizadas"
                            class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Moderna Plataforma Virtual</h5>
                        <p class="text-gray-600 text-sm">Acceso rápido y eficiente a recursos educativos con la mejor
                            tecnología.</p>
                    </div>
                    <!-- Servicio 2 -->
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/clases.jpg') }}" alt="Simulacros de Examen" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Sesiones Online</h5>
                        <p class="text-gray-600 text-sm">Clases en vivo con interacción directa y seguimiento
                            personalizado.</p>
                    </div>
                    <!-- Servicio 3 -->
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/docentes.jpg') }}" alt="Asesoría Vocacional" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">La Mejor Plana Docente</h5>
                        <p class="text-gray-600 text-sm">Docentes expertos comprometidos con tu éxito académico.</p>
                    </div>
                    <!-- Servicio 4 -->
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/biblioteca.png') }}" alt="Servicio 4" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Biblioteca Virtual</h5>
                        <p class="text-gray-600 text-sm">Accede a libros y recursos siempre actualizados</p>
                    </div>
                    <!-- Servicio 5 (y más servicios si los tienes) -->
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/examen.jpg') }}" alt="Servicio 5" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Exámenes en Línea</h5>
                        <p class="text-gray-600 text-sm">Simulacros online que replican el formato del examen real.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/test.png') }}" alt="Servicio 5" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Test Vocacional</h5>
                        <p class="text-gray-600 text-sm">Encuentra la carrera ideal con nuestro test vocacional.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/wspp.png') }}" alt="Servicio 5" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Grupo de Whatsapp 24/7</h5>
                        <p class="text-gray-600 text-sm">Resuelve dudas y recibe apoyo en cualquier momento.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ">
                        <img src="{{ asset('image/mate.jpg') }}" alt="Servicio 5" class="rounded-md mb-4">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">Grupo de Mate-Básica</h5>
                        <p class="text-gray-600 text-sm">Aprende matemáticas básicas de manera gratuita y efectiva.</p>
                    </div>
                    <!-- Añadir más servicios aquí -->
                </div>

                <!-- Botón izquierdo -->
                <button id="prevBtn"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                    < </button>
                        <!-- Botón derecho -->
                        <button id="nextBtn"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                            >
                        </button>
            </div>
        </div>
    </section>

    <!-- Sobre Nosotros -->
    <section id="about" class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="bg-yellow-300 p-10 rounded-lg shadow-lg flex flex-col md:flex-row items-center">
                <!-- Imagen a la izquierda -->
                <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                    <img src="{{ asset('image/logo.png') }}" alt="Sobre Nosotros" class="rounded-lg  w-100">
                </div>

                <!-- Contenido a la derecha -->
                <div class="w-full md:w-1/2 md:pl-10">
                    <h2 class="text-3xl font-bold text-blue-600 mb-4">SOBRE NOSOTROS</h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-4">
                        Somos una academia con más de 10 años de experiencia preparando estudiantes para los exámenes de
                        ingreso a las mejores universidades del país. Nuestro objetivo es ayudarte a cumplir tus sueños
                        académicos y alcanzar el éxito.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Ofrecemos una variedad de programas personalizados, simulacros de examen y asesoramiento
                        profesional para guiarte a través del proceso educativo y asegurar que logres tus metas
                        académicas.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Cursos (Slider Manual) -->
    <section id="cursos" class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto ">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-5">NUESTROS CURSOS</h2>

            <!-- Contenedor del Slider -->
            <div class="relative">
                <!-- Contenedor de los cursos (deslizable) -->
                <div id="sliderCursos" class="flex overflow-x-hidden gap-8">

                    @foreach ($cursos as $curso)
                        <div class="bg-white rounded-lg shadow-lg w-72  flex-none p-6 ">
                            <a href="{{ route('cursos.show', $curso) }}" class="block">
                                <img src="{{ isset($curso->image->url) ? Storage::disk('s3')->url($curso->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                                    alt="Curso {{ $curso->id }}" class="rounded-md mb-4">
                                <h5 class="text-xl font-semibold text-blue-600 mb-2">{{ $curso->nombre }}</h5>
                                <p class="text-gray-600 text-sm">{{ Str::limit($curso->descripcion, 60) }}</p>
                            </a>
                        </div>
                    @endforeach

                    <!-- Botón izquierdo -->
                    <button id="prevBtnCursos"
                        class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                        < </button>
                            <!-- Botón derecho -->
                            <button id="nextBtnCursos"
                                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                                >
                            </button>
                </div>
            </div>
    </section>


    <section class="mt-24 mb-24 bg-yellow-300 py-12">
        <h1 class="text-center text-blue-800 text-3xl font-bold">ÚNETE A NUESTROS GRUPOS GRATUITOS</h1>
        <p class="text-center text-black mt-2 font-semibold">Compartimos material de mucho interés para ti. Ingresa de
            manera
            gratuita
            dándole click al enlace de abajo o desde aquí.</p>
        <div class="flex justify-center mt-5 space-x-4">
            <!-- Botón de Facebook -->
            <a href="https://www.facebook.com/ceprevallejo2021" target="_blank" rel="noopener noreferrer"
                class="bg-black flex items-center justify-center rounded-full h-12 w-12 hover:bg-gray-200">
                <img src="https://w7.pngwing.com/pngs/561/460/png-transparent-fb-facebook-facebook-logo-social-media-icon.png"
                    alt="Facebook" class="rounded-full" loading="lazy">
            </a>

            <!-- Botón de WhatsApp -->
            <a href="#" target="_blank"
                class="bg-black flex items-center justify-center rounded-full h-12 w-12 hover:bg-gray-200">
                <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" alt="WhatsApp" class="rounded-full"
                    loading="lazy">
            </a>
        </div>
    </section>

    <x-wspp-boton />

    <!-- Estilos adicionales para el slider -->
    {{-- <style>
        /* Ocultar los servicios que no están dentro del área visible */
        #sliderContainer {
            scroll-behavior: smooth;
        }
    </style> --}}

    <!-- Script para controlar el slider -->
    <script>
        const slider = document.getElementById('sliderContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let scrollAmount = 0;

        // Ajustar el tamaño de los deslizamientos en función de la ventana
        function calculateSlideWidth() {
            const serviceWidth = document.querySelector('#sliderContainer > div').offsetWidth;
            return serviceWidth + 32; // Añadimos el gap entre los servicios (32px)
        }

        nextBtn.addEventListener('click', () => {
            const slideWidth = calculateSlideWidth();
            slider.scrollBy({
                left: slideWidth,
                behavior: 'smooth'
            });
        });

        prevBtn.addEventListener('click', () => {
            const slideWidth = calculateSlideWidth();
            slider.scrollBy({
                left: -slideWidth,
                behavior: 'smooth'
            });
        });
    </script>

    <!-- Script para controlar el slider de cursos -->
    <script>
        const sliderCursos = document.getElementById('sliderCursos');
        const prevBtnCursos = document.getElementById('prevBtnCursos');
        const nextBtnCursos = document.getElementById('nextBtnCursos');

        function calculateSlideWidthCursos() {
            const courseWidth = document.querySelector('#sliderCursos > div').offsetWidth;
            return courseWidth + 32; // Añadimos el gap entre los cursos (32px)
        }

        nextBtnCursos.addEventListener('click', () => {
            const slideWidth = calculateSlideWidthCursos();
            sliderCursos.scrollBy({
                left: slideWidth,
                behavior: 'smooth'
            });
        });

        prevBtnCursos.addEventListener('click', () => {
            const slideWidth = calculateSlideWidthCursos();
            sliderCursos.scrollBy({
                left: -slideWidth,
                behavior: 'smooth'
            });
        });
    </script>
</x-app-layout>
