<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Platillo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('platillos.update', $platillo->id) }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" value="{{ $platillo->nombre }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="tiempo_elaboracion" class="block text-white text-sm font-bold mb-2">Tiempo de Elaboración:</label>
                                <input type="number" name="tiempo_elaboracion" id="tiempo_elaboracion" value="{{ $platillo->tiempo_elaboracion }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="costo_produccion" class="block text-white text-sm font-bold mb-2">Costo de Producción:</label>
                                <input type="number" name="costo_produccion" id="costo_produccion" value="{{ $platillo->costo_produccion }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>

                            <div>
                                <label for="precio_venta" class="block text-white text-sm font-bold mb-2">Precio de Venta:</label>
                                <input type="number" name="precio_venta" id="precio_venta" value="{{ $platillo->precio_venta }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-white text-sm font-bold mb-2">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900">{{ $platillo->descripcion }}</textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <x-button class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                {{ __('Actualizar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
