<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight text-center">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                <h3 class="text-2xl font-semibold mb-6">Servicios disponibles</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- CUADRO DE USUARIOS -->
                    <a href="{{ url('/usuarios') }}"
                        class="relative group w-48 h-48 bg-gray-200 rounded-xl shadow-md overflow-hidden cursor-pointer">

                        <!-- Imagen -->
                        <img src="https://cdn-icons-png.flaticon.com/512/6326/6326055.png"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">

                        <!-- Overlay al pasar el mouse -->
                        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center 
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-xl font-semibold">Usuarios</span>
                        </div>
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
