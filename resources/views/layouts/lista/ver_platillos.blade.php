<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Platillos por Sucursal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('lista.ver.platillos') }}" method="GET">
                    <div class="mb-4">
                        <label for="sucursal_id" class="block text-sm font-medium text-white">Seleccione una Sucursal:</label>
                        <div class="relative">
                            <select name="sucursal_id" id="sucursal_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="this.form.submit()">
                                @forelse ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}" {{ (request('sucursal_id') == $sucursal->id) ? 'selected' : '' }}>
                                        {{ $sucursal->nombre }}
                                    </option>
                                @empty
                                    <option>No hay sucursales disponibles</option>
                                @endforelse
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 11.707a1 1 0 0 0 1.414-1.414L6.414 6.586A2 2 0 1 0 5 8.002l4.292 4.293zm-1.414 2.586a1 1 0 1 0 1.414 1.414L6.414 8.414A2 2 0 0 0 5 8.002l1.879 1.879zM10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                            </div>
                        </div>
                    </div>
                </form>
                @if($sucursales->isEmpty())
                    <p>No hay sucursales creadas.</p>
                @else
                    @if(!$platillos || $platillos->isEmpty())
                        <p>No hay platillos asignados a esta sucursal o no se ha seleccionado una sucursal.</p>
                    @else
                        <h3 class="block text-sm font-medium text-white">Platillos Disponibles</h3>
                        <div class="mt-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiempo de Elaboración</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Costo de Producción</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio de Venta</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($platillos as $platillo)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $platillo->nombre }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $platillo->descripcion }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $platillo->tiempo_elaboracion }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $platillo->costo_produccion }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $platillo->precio_venta }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 whitespace-nowrap">No hay platillos disponibles.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
