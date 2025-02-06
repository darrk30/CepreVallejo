<x-app-layout>
    <!-- Sección de Bienvenida -->
    <div class="bg-blue-600 text-white py-24" style="height: 70vh">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">¡Bienvenido(a) al Aula Virtual!</h1>
            <p class="text-lg">
                Estamos encantados de tenerte aquí. En nuestra plataforma, podrás continuar tu aprendizaje de manera flexible y a tu propio ritmo. Explora el contenido, interactúa con tus profesores y compañeros, y lleva tu conocimiento al siguiente nivel.
            </p>
            <p class="mt-4 text-lg mb-5">
                Si tienes alguna duda o necesitas ayuda, ¡no dudes en contactarnos!
            </p>
            <a href="{{ route('misCursos') }}" class="mt-12 bg-white text-blue-600 font-semibold px-6 py-2 rounded-lg shadow-lg hover:bg-gray-100 transition duration-200">
                Empezar ahora
            </a>
        </div>
    </div>
</x-app-layout>
