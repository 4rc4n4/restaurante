<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Platillos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('platillos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear Nuevo Platillo
                        </a>
                    </div>
                    @foreach ($platillos as $platillo)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 flex">
                                <div class="flex-1">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Nombre:</span>
                                            <span class="text-gray-800 dark:text-gray-200">{{ $platillo->nombre }}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Tiempo de Elaboración:</span>
                                            <span class="text-gray-800 dark:text-gray-200">{{ $platillo->tiempo_elaboracion }} min</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Precio de Venta:</span>
                                            <span class="text-gray-800 dark:text-gray-200">${{ number_format($platillo->precio_venta, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Costo de Producción:</span>
                                            <span class="text-gray-800 dark:text-gray-200">${{ number_format($platillo->costo_produccion, 2) }}</span>
                                        </div>
                                        <div class="flex justify-end items-center">
                                            <a href="{{ route('platillos.edit', $platillo->id) }}" class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded mr-2">Editar</a>
                                            <form action="{{ route('platillos.destroy', $platillo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="return confirm('¿Estás seguro de querer eliminar este platillo?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
