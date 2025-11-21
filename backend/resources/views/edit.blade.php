<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Modificar Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg">

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('usuarios/modificar/'.$user->id) }}" method="POST">
                @csrf

                {{-- NOMBRE --}}
                <label class="block mb-2 font-bold">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border p-2 rounded mb-4" required>

                {{-- TELÉFONO --}}
                <label class="block mb-2 font-bold">Número de teléfono</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                    placeholder="Ej: +573001234567"
                    class="w-full border p-2 rounded mb-4">

                {{-- PASSWORD --}}
                <label class="block mb-2 font-bold">Nueva contraseña (opcional)</label>
                <input type="password" name="password"
                    class="w-full border p-2 rounded mb-4"
                    placeholder="Dejar en blanco para no cambiar">

                {{-- BOTÓN --}}
                <button class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 w-full">
                    Guardar cambios
                </button>
            </form>
        </div>
    </div>
    
</x-app-layout>
