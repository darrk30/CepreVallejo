<x-app-layout>
    @section('title', '- Conocenos')
    <!-- Banner con imagen fijo -->
    <section
        class="h-screen text-center text-white bg-cover bg-center bg-no-repeat banner flex items-center justify-center"
        style="height: 25vh; background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20190221/ourmid/pngtree-school-season-back-to-school-season-blue-cartoon-image_11842.jpg);">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl font-bold mb-4">Bienvenidos a Nuestra Empresa</h1>
            
        </div>
    </section>

    <!-- Sección de Historia de la Empresa -->
    <section class="bg-white py-10 flex items-center justify-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <!-- Contenido de la Historia de la Empresa -->
            <div class="md:w-2/3 text-center md:text-left md:pr-12 mb-8 md:mb-0">
                <h2 class="text-3xl font-bold mb-6 text-blue-700">NUESTRA HISTORIA</h2>
                <p class="text-gray-700 font-semibold leading-relaxed text-justify">
                    Acedemia Preuniversitaria CepreVallejo con RUC: 2060608756362, es una institución preuniversitaria
                    fundada en 2020 por el Prof. Ram Ruiz
                    Molina. Nos dedicamos a preparar a estudiantes escolares y preuniversitarios para enfrentar los
                    retos de la educación superior. A través de convenios con municipalidades distritales y
                    provinciales; así como también, con gobiernos regionales a nivel nacional. Facilitamos el acceso a
                    programas educativos de calidad a tarifas preferenciales. Nuestra metodología combina clases
                    teóricas y prácticas, utilizando recursos tecnológicos para optimizar el aprendizaje. Nos
                    comprometemos a brindar una educación integral que fomente el éxito académico y personal de nuestros
                    alumnos.
                </p>
            </div>
            <!-- Imagen de la Historia de la Empresa -->
            <div class="md:w-1/3 flex justify-center">
                <img src="{{ asset('image/nosotros.jpg') }}"
                    alt="Imagen de la Empresa" class="rounded-lg w-100">
            </div>
        </div>
    </section>
    
    

    <!-- Sección de Misión y Visión con Tarjetas Flips -->
    <section class="bg-white flex items-center mb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-center gap-8">
            <!-- Card 1 - Misión -->
            <div class="relative w-80 h-96 perspective">
                <div class="flip-card-inner transition-transform duration-700 transform-style preserve-3d">
                    <!-- Front Side -->
                    <div
                        class="flip-card-front absolute w-full h-full bg-blue-600 rounded-lg shadow-lg flex justify-center items-center">
                        <img class="object-cover w-full h-full rounded-lg" src="{{ asset('image/mision.png') }}"
                            alt="Misión">
                    </div>
                    <!-- Back Side -->
                    <div
                        class="flip-card-back absolute w-full h-full bg-blue-600 rounded-lg shadow-lg flex justify-center items-center p-4 backface-hidden">
                        <p class="text-white text-justify">Cepre Vallejo tiene como misión transformar la educación
                            preuniversitaria mediante el desarrollo de programas innovadores que integren tecnología y
                            metodologías activas. Nos enfocamos en fomentar el aprendizaje significativo y la motivación
                            de los estudiantes, proporcionando recursos y apoyo académico que les permitan alcanzar su
                            máximo potencial y asegurar su éxito en el acceso a la educación superior.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Visión -->
            <div class="relative w-80 h-96 perspective">
                <div class="flip-card-inner transition-transform duration-700 transform-style preserve-3d">
                    <!-- Front Side -->
                    <div
                        class="flip-card-front absolute w-full h-full bg-blue-600 rounded-lg shadow-lg flex justify-center items-center">
                        <img class="object-cover w-full h-full rounded-lg" src="{{ asset('image/vision.png') }}"
                            alt="Visión">
                    </div>
                    <!-- Back Side -->
                    <div
                        class="flip-card-back absolute w-full h-full bg-blue-600 rounded-lg shadow-lg flex justify-center items-center p-4 backface-hidden">
                        <p class="text-white text-justify">Ser reconocidos como una de las principales instituciones
                            preuniversitarias del país, destacando por nuestra excelencia académica, innovación en
                            métodos de enseñanza y compromiso social. Aspiramos a expandir nuestro alcance mediante
                            alianzas estratégicas, garantizando que todos los estudiantes tengan acceso a una educación
                            de calidad que potencie su futuro.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Docentes (Slider Manual) -->
    <section id="docentes" class="py-12  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">NUESTROS DOCENTES</h2>

            <!-- Contenedor del Slider -->
            <div class="relative">
                <!-- Contenedor de los docentes (deslizable) -->
                <div id="sliderDocentes" class="flex overflow-x-hidden gap-8">
                    @foreach ($profesores as $profesor)
                    <div class="bg-white rounded-lg shadow-lg w-72 flex-none p-6 ml-7">
                        <img src="{{ isset($profesor->image->url) ? Storage::disk('s3')->url($profesor->image->url) : 'https://img.freepik.com/vector-premium/ilustracion-avatar-hombre-negocios-retrato-usuario-dibujos-animados-icono-perfil-usuario_118339-5507.jpg' }}"
                    alt="{{ $profesor->nombre }}" class="rounded-full mb-4 mx-auto" alt="Docente {{$profesor->name}}">
                        <h5 class="text-xl font-semibold text-blue-600 mb-2">{{$profesor->name}} {{$profesor->profile->apellido}}</h5>
                        <p class="text-gray-600 text-sm">{{$profesor->descripcion}}</p>
                    </div>
                    @endforeach                   
                </div>

                <!-- Botón izquierdo -->
                <button id="prevBtnDocentes"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                    < </button>
                        <!-- Botón derecho -->
                        <button id="nextBtnDocentes"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                            >
                        </button>
            </div>
        </div>
    </section>
    <script>
        const sliderDocentes = document.getElementById('sliderDocentes');
        const prevBtnDocentes = document.getElementById('prevBtnDocentes');
        const nextBtnDocentes = document.getElementById('nextBtnDocentes');

        function calculateSlideWidthDocentes() {
            const docenteWidth = document.querySelector('#sliderDocentes > div').offsetWidth;
            return docenteWidth + 32; // Añadimos el gap entre los docentes (32px)
        }

        nextBtnDocentes.addEventListener('click', () => {
            const slideWidth = calculateSlideWidthDocentes();
            sliderDocentes.scrollBy({
                left: slideWidth,
                behavior: 'smooth'
            });
        });

        prevBtnDocentes.addEventListener('click', () => {
            const slideWidth = calculateSlideWidthDocentes();
            sliderDocentes.scrollBy({
                left: -slideWidth,
                behavior: 'smooth'
            });
        });

        // Ajustar slider al redimensionar
        window.addEventListener('resize', () => {
            const slideWidth = calculateSlideWidthDocentes();
            sliderDocentes.scrollBy({
                left: -slideWidth * currentSlide,
                behavior: 'auto'
            });
        });
    </script>
</x-app-layout>
