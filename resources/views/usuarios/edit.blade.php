<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre del usuario"
                                   value="{{ $usuario->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="email_contacto" class="block text-gray-700 text-sm font-bold mb-2">Email de contacto:</label>
                            <input id="email_contacto" name="email_contacto" type="email" placeholder="Email del usuario"
                                   value="{{ $usuario->email_contacto }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="sucursal_id" class="block text-gray-700 text-sm font-bold mb-2">Sucursal:</label>
                            <select id="sucursal_id" name="sucursal_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Seleccione una sucursal</option>

                                @foreach($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}" {{ $usuario->sucursal_id == $sucursal->id ? 'selected' : '' }}>{{ $sucursal->nombre }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="flex items-center justify-between">
                            <x-button class="ml-3">
                                {{ __('Actualizar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
