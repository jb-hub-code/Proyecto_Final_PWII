<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Usuarios Registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- LISTA DE USUARIOS --}}
            <div class="bg-gray-100 p-6 rounded-lg">

                <h3 class="text-2xl font-bold mb-6">Lista de Usuarios</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($users as $user)
                        <div class="relative p-6 bg-white rounded-xl shadow-lg">

                            <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                            <p class="text-gray-700">{{ $user->email }}</p>

                            <p class="text-gray-500 text-sm mt-2">
                                Registrado el {{ $user->created_at->format('d M Y') }}
                            </p>

                            {{-- BOTÓN DE OPCIONES (3 PUNTOS) --}}
                            <div class="absolute top-4 right-4">
                                <button onclick="toggleMenu({{ $user->id }})"
                                        class="p-2 rounded-full hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zm0 6a.75.75 0 110-1.5.75.75 0 010 1.5zm0 6a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                </button>

                                {{-- MENU MODIFICAR / ELIMINAR --}}
                                <div id="menu-{{ $user->id }}"
                                     class="hidden absolute right-0 mt-2 w-32 bg-white shadow-lg rounded-md py-2 z-10">

                                    <a href="{{ url('usuarios/modificar/'.$user->id) }}"
                                       class="block px-4 py-2 hover:bg-gray-100">
                                        Modificar
                                    </a>

                                    <form action="{{ url('usuarios/eliminar/'.$user->id) }}" method="POST" 
                                          onsubmit="return confirm('¿Eliminar usuario?')">
                                        @csrf
                                        <button class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    {{-- SCRIPT PARA MOSTRAR/OCULTAR MENÚ DE OPCIONES --}}
    <script>
        function toggleMenu(id) {
            const menu = document.getElementById(`menu-${id}`);
            menu.classList.toggle('hidden');
        }
    </script>

</x-app-layout>
