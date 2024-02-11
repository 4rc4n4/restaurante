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
                        <label for="sucursal_id" class="block text-sm font-medium text-gray-700">Seleccione una Sucursal:</label>
                        <select name="sucursal_id" id="sucursal_id" class="form-select block w-full mt-1" onchange="this.form.submit()">
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if(isset($platillos))
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Platillos en {{ $sucursalSeleccionada->nombre }}:</h3>
                    <ul class="list-disc pl-5 mt-4">
                        @forelse($platillos as $platillo)
                            <li>{{ $platillo->nombre }}</li>
                        @empty
                            <li>No hay platillos asignados a esta sucursal.</li>
                        @endforelse
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
