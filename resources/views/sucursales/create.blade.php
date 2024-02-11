<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nueva Sucursal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('sucursales.store') }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="nombre" class="block text-sm font-medium text-white">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="domicilio" class="block text-sm font-medium text-white">Domicilio:</label>
                                <input type="text" name="domicilio" id="domicilio" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="telefono" class="block text-sm font-medium text-white">Teléfono de contacto:</label>
                                <input type="tel" name="telefono" id="telefono" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-white">Email de contacto:</label>
                                <input type="email" name="email" id="email" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                                @if ($errors->has('email'))
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                            </div>

                            <div class="mb-4">
                                <label for="ciudad" class="block text-sm font-medium text-white">Ciudad:</label>
                                <input type="text" name="ciudad" id="ciudad" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="estado" class="block text-sm font-medium text-white">Estado:</label>
                                <input type="text" name="estado" id="estado" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="pais" class="block text-sm font-medium text-white">País:</label>
                                <input type="text" name="pais" id="pais" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>

                            <div class="mb-4">
                                <label for="codigo_postal" class="block text-sm font-medium text-white">Código Postal:</label>
                                <input type="text" name="codigo_postal" id="codigo_postal" class="mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" required>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                Guardar
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
