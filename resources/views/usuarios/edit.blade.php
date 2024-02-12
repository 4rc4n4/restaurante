<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="max-w-md mx-auto bg-transparent shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nombre" class="block text-sm font-bold mb-2 text-gray-700">Nombre:</label>
                                <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre del usuario"
                                       value="{{ $usuario->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="email_contacto" class="block text-sm font-bold mb-2 text-gray-700">Email de contacto:</label>
                                <input id="email_contacto" name="email_contacto" type="email" placeholder="Email del usuario"
                                       value="{{ $usuario->email_contacto }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="sucursal_id" class="block text-sm font-bold mb-2 text-gray-700">Sucursal:</label>
                                <select id="sucursal_id" name="sucursal_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Seleccione una sucursal</option>
                                    @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->id }}" {{ $usuario->sucursal_id == $sucursal->id ? 'selected' : '' }}>{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="domicilio" class="block text-sm font-bold mb-2 text-gray-700">Domicilio:</label>
                                <input id="domicilio" name="domicilio" type="text" placeholder="Domicilio del usuario"
                                       value="{{ $usuario->domicilio }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="telefono_contacto" class="block text-sm font-bold mb-2 text-gray-700">Teléfono de contacto:</label>
                                <input id="telefono_contacto" name="telefono_contacto" type="tel" placeholder="Teléfono de contacto"
                                       value="{{ $usuario->telefono_contacto }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="role_id" class="block text-sm font-bold mb-2 text-gray-700">Rol:</label>
                                <select id="role_id" name="role_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $usuario->roles && $usuario->roles->first() && $usuario->roles->first()->id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="numero_seguro_social" class="block text-sm font-bold mb-2 text-gray-700">Número de Seguro Social:</label>
                                <input id="numero_seguro_social" name="numero_seguro_social" type="text" placeholder="Número de Seguro Social"
                                       value="{{ $usuario->numero_seguro_social }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="RFC" class="block text-sm font-bold mb-2 text-gray-700">RFC:</label>
                                <input id="RFC" name="RFC" type="text" placeholder="RFC del usuario"
                                       value="{{ $usuario->RFC }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>

                            <div>
                                <label for="sueldo_diario" class="block text-sm font-bold mb-2 text-gray-700">Sueldo Diario:</label>
                                <input id="sueldo_diario" name="sueldo_diario" type="number" step="0.01" placeholder="Sueldo diario del usuario"
                                       value="{{ $usuario->sueldo_diario }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Actualizar') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
