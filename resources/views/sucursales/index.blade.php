<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sucursales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('sucursales.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                            {{ __('Crear Nueva Sucursal') }}
                        </a>
                    </div>
                    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-800">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Domicilio
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Teléfono
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Ciudad
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                @foreach ($sucursales as $sucursal)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-white">
                                            {{ $sucursal->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white">
                                            {{ $sucursal->domicilio }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white">
                                            {{ $sucursal->telefono }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white">
                                            {{ $sucursal->ciudad }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('sucursales.edit', $sucursal->id) }}" class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded mr-2">Editar</a>
                                            <form action="{{ route('sucursales.destroy', $sucursal->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="return confirm('¿Estás seguro de querer eliminar este platillo?')">Eliminar</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
