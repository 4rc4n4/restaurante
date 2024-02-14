<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Platillos por Sucursal
        </h2>
    </x-slot>
    <style>
        .container {
            max-width: 4xl;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            color: #333;
        }
        label {
            color: #000000;
            font-size: 16px;
            margin-bottom: 0.5rem;
        }
        select {
            display: block;
            width: 100%;
            padding: 0.5rem;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            color: #000;
        }
        select:focus {
            border-color: #007bff;
            outline: none;
        }
        table {
            width: 100%;
            margin-top: 1rem;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            color: #000;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
            color: #000;
        }
    </style>
    <div class="py-12">
        <div class="container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('lista.ver.platillos') }}" method="GET">
                <div class="mb-4">
                    <label for="sucursal_id" class="block text-sm font-medium text-gray-500 dark:text-gray-500">Seleccione una Sucursal:</label>
                    <div class="relative">
                        <select name="sucursal_id" id="sucursal_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-3 py-1.5 text-sm rounded-md shadow-sm leading-tight focus:outline-none focus:bg-white focus:border-blue-500" onchange="this.form.submit()">
                            @forelse ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}" {{ (request('sucursal_id') == $sucursal->id) ? 'selected' : '' }}>
                                    {{ $sucursal->nombre }}
                                </option>
                            @empty
                                <option>No hay sucursales disponibles</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </form>
            @if($sucursales->isEmpty())
                <p>No hay sucursales creadas.</p>
            @elseif(!$platillos || $platillos->isEmpty())
                <p>No hay platillos asignados a esta sucursal o no se ha seleccionado una sucursal.</p>
            @else
                <h3 class="block text-sm font-medium text-gray-500 dark:text-gray-500">Platillos Disponibles</h3>
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
        </div>
    </div>
</x-app-layout>
