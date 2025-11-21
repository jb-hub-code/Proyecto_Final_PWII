<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
        
        <h2 class="text-xl font-bold mb-4">Confirmar Cambios</h2>

        <form action="{{ route('usuarios.validar') }}" method="POST">
            @csrf

            <label class="block mb-2">Código enviado a tu correo</label>
            <input type="text" name="code" class="w-full border p-2 rounded mb-4">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Confirmar
            </button>
        </form>
    </div>
</x-app-layout>
