<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('usuarios.store') }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('nombre') }}">
                                <x-input-error :messages="$errors->get('nombre')" />
                            </div>

                            <div class="mb-4">
                                <label for="domicilio" class="block text-white text-sm font-bold mb-2">Domicilio:</label>
                                <input id="domicilio" name="domicilio" type="text" placeholder="Ingrese el domicilio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('domicilio') }}">
                                <x-input-error :messages="$errors->get('domicilio')" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="telefono_contacto" class="block text-white text-sm font-bold mb-2">Teléfono de contacto:</label>
                                <input id="telefono_contacto" name="telefono_contacto" type="tel" placeholder="Ingrese el teléfono de contacto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('telefono_contacto') }}">
                                <x-input-error :messages="$errors->get('telefono_contacto')" />
                            </div>

                            <div class="mb-4">
                                <label for="email_contacto" class="block text-white text-sm font-bold mb-2">Email de contacto:</label>
                                <input id="email_contacto" name="email_contacto" type="email" placeholder="Ingrese el email de contacto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('email_contacto') }}">
                                <x-input-error :messages="$errors->get('email_contacto')" />
                            </div>

                            <div class="mb-4">
                                <label for="puesto" class="block text-white text-sm font-bold mb-2">Puesto:</label>
                                <input id="puesto" name="puesto" type="text" placeholder="Ingrese el puesto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('puesto') }}">
                                <x-input-error :messages="$errors->get('puesto')" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="numero_seguro_social" class="block text-white text-sm font-bold mb-2">Número de Seguro Social:</label>
                                <input id="numero_seguro_social" name="numero_seguro_social" type="text" placeholder="Ingrese el número de seguro social" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('numero_seguro_social') }}">
                                <x-input-error :messages="$errors->get('numero_seguro_social')" />
                            </div>

                            <div class="mb-4">
                                <label for="RFC" class="block text-white text-sm font-bold mb-2">RFC:</label>
                                <input id="RFC" name="RFC" type="text" placeholder="Ingrese el RFC" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('RFC') }}">
                                <x-input-error :messages="$errors->get('RFC')" />
                            </div>

                            <div class="mb-4">
                                <label for="sueldo_diario" class="block text-white text-sm font-bold mb-2">Sueldo Diario:</label>
                                <input id="sueldo_diario" name="sueldo_diario" type="number" step="0.01" placeholder="Ingrese el sueldo diario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('sueldo_diario') }}">
                                <x-input-error :messages="$errors->get('sueldo_diario')" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="sueldo_diario" class="block text-white text-sm font-bold mb-2">Sucursal:</label>
                            <select id="sucursal_id" name="sucursal_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Seleccione una sucursal</option>
                                @foreach($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <x-button class="ml-3">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
