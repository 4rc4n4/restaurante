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
                    <h2>Alta de sucursales</h2>

                    <form method="POST" action="{{ route('Sucursal.store')}}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
                        @csrf
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="nombre">
                                    Nombre
                                </label>
                                <input name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="nombre" type="text" placeholder="Nombre">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="domicilio">
                                    Domicilio
                                </label>
                                <input name="domicilio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="domicilio" type="text" placeholder="Domicilio">
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="telefono">
                                    Teléfono de contacto
                                </label>
                                <input name="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="telefono" type="tel" placeholder="Teléfono de contacto">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="email">
                                    Email de contacto
                                </label>
                                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="email" type="email" placeholder="Email de contacto">
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="ciudad">
                                    Ciudad
                                </label>
                                <input name="ciudad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="ciudad" type="text" placeholder="Ciudad">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="estado">
                                    Estado
                                </label>
                                <input name="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="estado" type="text" placeholder="Estado">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="pais">
                                    País
                                </label>
                                <input name="pais" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="pais" type="text" placeholder="País">
                            </div>
                        </div>
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2" for="codigo_postal">
                                    Código Postal
                                </label>
                                <input name="codigo_postal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white text-gray-900" id="codigo_postal" type="text" placeholder="Código Postal">
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
        </div>
    </div>
</x-app-layout>
