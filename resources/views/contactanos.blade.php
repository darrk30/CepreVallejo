<x-app-layout>
    @section('title', '- Contactanos')
    <div class=" flex items-center justify-center my-2">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 p-6 bg-white shadow-lg rounded-lg">
            <div class="flex flex-col lg:flex-row flex-wrap">
                <!-- Form -->
                <div class="w-full lg:w-2/3 p-6 order-1 lg:order-2">
                    <h2 class="text-2xl font-semibold mb-4 text-blue-600">CONTACTANOS</h2>
                    <form class="space-y-6">
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <div class="w-full sm:w-1/2">
                                <label class="block mb-2 text-gray-600">Nombres</label>
                                <div class="relative">
                                    <input type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Escriba sus nombres">
                                    <i class="fas fa-user absolute right-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2">
                                <label class="block mb-2 text-gray-600">Apellidos</label>
                                <div class="relative">
                                    <input type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Escriba sus apellidos">
                                    <i class="fas fa-user absolute right-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <div class="w-full sm:w-1/2">
                                <label class="block mb-2 text-gray-600">Numero de telefono</label>
                                <div class="relative">
                                    <input type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Escriba su numero de telefono">
                                    <i class="fas fa-phone absolute right-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2">
                                <label class="block mb-2 text-gray-600">Correo Electronico</label>
                                <div class="relative">
                                    <input type="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Escriba su correo electronico">
                                    <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600">Escribe tu mensaje</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                rows="4" placeholder="Escriba su mensaje"></textarea>
                        </div>
                        <div>
                            <label class="block mb-2 text-gray-600">Seleccionar Asunto</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="subject" class="form-radio text-blue-500" checked>
                                    <span class="ml-2">Consulta general</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="subject" class="form-radio text-blue-500">
                                    <span class="ml-2">Apoyo técnico</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="subject" class="form-radio text-blue-500">
                                    <span class="ml-2">Comentarios del sitio web</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all">
                                <i class="fas fa-paper-plane mr-2"></i> Enviar mensaje
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="w-full lg:w-1/3 bg-blue-900 text-white p-6 rounded-lg order-2 lg:order-1 mb-6 lg:mb-0 flex flex-col">
                    <h2 class="text-xl font-semibold mb-4">Información del contacto</h2>
                    <p class="text-white mb-6">¿Tiene alguna gran idea o duda y necesita ayuda?</p>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>
                                <a href="mailto:cprevallejo@gmail.com" class="text-white hover:underline">cprevallejo@gmail.com</a>
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            <span>
                                <a href="tel:+51949950337" class="text-white hover:underline">+51 949 950 337</a>
                            </span>
                        </li>
                        
                        {{-- <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <span>123 Street 256 House</span>
                        </li> --}}
                    </ul>
                    <!-- Redes sociales -->
                    <div class="flex justify-center space-x-20 mt-auto">
                        <a href="#" class="text-white text-2xl transition-transform transform hover:scale-125 hover:text-blue-400"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white text-2xl transition-transform transform hover:scale-125 hover:text-blue-400"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white text-2xl transition-transform transform hover:scale-125 hover:text-blue-400"><i class="fab fa-instagram"></i></a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
