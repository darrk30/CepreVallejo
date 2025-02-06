<!-- resources/views/components/whatsapp-button.blade.php -->
<div class="fixed bottom-4 right-4 z-50 flex items-center space-x-2 group">
    <a href="https://wa.me/51942407799?text=Hola%2C%20quiero%20informaci%C3%B3n%20para%20matricularme%20a%20CEPREVALLEJO" target="_blank" class="flex items-center space-x-2 no-underline">
        <!-- Mensaje que aparece al pasar el mouse -->
        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-green-500 text-white px-3 py-2 rounded-lg text-sm">
            Contáctanos
        </span>
        <!-- Botón flotante de WhatsApp (redondo) -->
        <div class="bg-green-500 hover:bg-green-600 p-4 rounded-full shadow-lg transition-colors duration-300">
            <i class="fab fa-whatsapp text-white text-2xl"></i>
        </div>
    </a>
</div>
