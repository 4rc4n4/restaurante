<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Sucursal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('sucursales.update', $sucursal->id) }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" value="{{ $sucursal->nombre }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="domicilio" class="block text-white text-sm font-bold mb-2">Domicilio:</label>
                                <input type="text" name="domicilio" id="domicilio" value="{{ $sucursal->domicilio }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="telefono" class="block text-white text-sm font-bold mb-2">Teléfono de contacto:</label>
                                <input type="tel" name="telefono" id="telefono" value="{{ $sucursal->telefono }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="email" class="block text-white text-sm font-bold mb-2">Email de contacto:</label>
                                <input type="email" name="email" id="email" value="{{ $sucursal->email }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="ciudad" class="block text-white text-sm font-bold mb-2">Ciudad:</label>
                                <input type="text" name="ciudad" id="ciudad" value="{{ $sucursal->ciudad }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="estado" class="block text-white text-sm font-bold mb-2">Estado:</label>
                                <input type="text" name="estado" id="estado" value="{{ $sucursal->estado }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="pais" class="block text-white text-sm font-bold mb-2">País:</label>
                                <input type="text" name="pais" id="pais" value="{{ $sucursal->pais }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="codigo_postal" class="block text-white text-sm font-bold mb-2">Código Postal:</label>
                                <input type="text" name="codigo_postal" id="codigo_postal" value="{{ $sucursal->codigo_postal }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
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
