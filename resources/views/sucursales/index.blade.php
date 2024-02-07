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
                    <form method="POST" action="{{ route('Sucursal.store')}}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
                        @csrf
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" value="{{ old('nombre') }}">
                                <x-input-error :messages="$errors->get('nombre')" mensaje="El campo nombre es obligatorio" />
                            </div>

                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="domicilio">
                                    Domicilio
                                </label>
                                <input name="domicilio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="domicilio" type="text" placeholder="Domicilio" value="{{ old('domicilio') }}">
                                <x-input-error :messages="$errors->get('domicilio')" mensaje="El campo domicilio es obligatorio" />
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="telefono">
                                    Teléfono de contacto
                                </label>
                                <input name="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="telefono" type="tel" placeholder="Teléfono de contacto" value="{{ old('telefono') }}">
                                <x-input-error :messages="$errors->get('telefono')" mensaje="El campo teléfono es obligatorio" />
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="email">
                                    Email de contacto
                                </label>
                                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="email" type="email" placeholder="Email de contacto" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" mensaje="El campo email es obligatorio" />
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="ciudad">
                                    Ciudad
                                </label>
                                <input name="ciudad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="ciudad" type="text" placeholder="Ciudad" value="{{ old('ciudad') }}">
                                <x-input-error :messages="$errors->get('ciudad')" mensaje="El campo ciudad es obligatorio" />
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="estado">
                                    Estado
                                </label>
                                <input name="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="estado" type="text" placeholder="Estado" value="{{ old('estado') }}">
                                <x-input-error :messages="$errors->get('estado')" mensaje="El campo estado es obligatorio" />
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="pais">
                                    País
                                </label>
                                <input name="pais" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="pais" type="text" placeholder="País" value="{{ old('pais') }}">
                                <x-input-error :messages="$errors->get('pais')" mensaje="El campo país es obligatorio" />
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="codigo_postal">
                                    Código Postal
                                </label>
                                <input name="codigo_postal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="codigo_postal" type="text" placeholder="Código Postal" value="{{ old('codigo_postal') }}">
                                <x-input-error :messages="$errors->get('codigo_postal')" mensaje="El campo código postal es obligatorio" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Guardar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg dark:divide-gray-900" >
            @foreach ( $sucursales as $sucursal )
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800 dark:text-gray-200">nombre</span>
                        <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{$sucursal->created_at}}</small>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{$sucursal->nombre}}</p>
            </div>

            @endforeach

    </div>

        </div>
    </div>
</x-app-layout>
