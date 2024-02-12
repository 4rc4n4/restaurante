<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                    </div>
                    @foreach ($usuarios as $usuario)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 flex">
                                <div class="flex-1">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Nombre:</span>
                                            <span class="text-gray-800 dark:text-gray-200">{{$usuario->nombre}}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Email:</span>
                                            <span class="text-gray-800 dark:text-gray-200">{{$usuario->email_contacto}}</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-800 dark:text-gray-200 font-bold">Puesto:</span>
                                            <span class="text-gray-800 dark:text-gray-200">{{$usuario->puesto}}</span>
                                        </div>
                                        <!-- Otros campos relevantes -->
                                    </div>
                                    <div class="flex justify-end items-center">
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded mr-2">Editar</a>
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</button>

                                        </form>
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
