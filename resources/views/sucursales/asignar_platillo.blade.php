<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Asignar Platillos a Sucursal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Muestra la sucursal actual --}}
                    <h3>Asignando platillos a: {{ $sucursal->nombre }}</h3>

                    <form method="POST" action="{{ route('sucursales.platillos.asignar', $sucursal->id) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="platillos" class="block text-gray-700 text-sm font-bold mb-2">Platillos</label>
                            <select name="platillos[]" id="platillos" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white">
                                @foreach ($platillos as $platillo)
                                <option value="{{ $platillo->id }}" {{ $sucursal->platillos->contains($platillo->id) ? 'selected' : '' }}>
                                    {{ $platillo->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                Asignar Platillos
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
