<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/puntov.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Punto de Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                    <h1>Sucursal actual: <strong>{{$sucursal->nombre}}</strong></h1>
                    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                        <div >

                            <div class="flex-row">
                                <h3>Mesero: <strong>{{$usuario->nombre}}</strong></h3>

                            </div>
                    <hr>

                    <form action="{{ route('dashboard.store') }}" method="POST">
                        @csrf
                    <div class="flex-row">
                        Mesa: </strong>
                        <input type="number" id="mesa" name="mesa" placeholder="No. mesa" min="1" step="1" required/>
                        <input type="hidden" name="mesero" value="{{ $usuario->id }}" />
                        <input type="hidden" name="sucursal_id" value="{{ $sucursal->id }}" />
                        <button type="submit" class="cuenta-button">Abrir cuenta</button>
                    </div>
                    </form>


                    <hr>
                    <div class="scroll">
                        @forelse($ventas as $venta)
                            <div class="card">
                                <br>
                                <p>Mesa: {{ $venta->mesa }}</p>
                                <p>Total: ${{ number_format($venta->total, 2) }}</p>
                                <!--
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPlatillos-{{ $venta->id }}">
                                    Agregar Platillos
                                </button>
                            -->
                            </div>

                            <!-- Modal para la venta específica -->
                            <div class="modal fade" id="modalPlatillos-{{ $venta->id }}" tabindex="-1" aria-labelledby="modalPlatillosLabel-{{ $venta->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPlatillosLabel-{{ $venta->id }}">Agregar Platillos a la Venta #{{ $venta->id }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="platillos">Selecciona los platillos:</label>
                                                <select id="platillos" name="platillos[]" class="form-control" multiple>
                                                    @foreach($platillos as $platillo)
                                                    <option value="{{ $platillo->id }}">{{ $platillo->nombre }} - ${{ number_format($platillo->precio_venta, 2) }}</option>
                                                    @endforeach
                                                </select>

                                                <div id="seleccionPlatillos"></div>

                                                <button type="button" id="agregarPlatillo">Agregar a la Cuenta</button>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </div>
                                </div>
    </div>


                        @empty
                            <p>No hay ventas pendientes.</p>
                        @endforelse
                    </div>

            </div>
        </div>
    </div>

</x-app-layout>

<!-- Inclusión de CSS de Bootstrap -->

<!-- Inclusión de JS de Bootstrap y sus dependencias (jQuery y Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    let platillosSeleccionados = [];

    document.getElementById('agregarPlatillo').addEventListener('click', function() {
        let seleccion = document.getElementById('platillos');
        let seleccionados = Array.from(seleccion.selectedOptions).map(option => {
            return {
                id: option.value,
                nombre: option.text,
                cantidad: 1 // Inicia con una cantidad de 1
            };
        });

        // Agrega o incrementa la cantidad en la selección actual
        seleccionados.forEach(nuevoPlatillo => {
            let existente = platillosSeleccionados.find(platillo => platillo.id === nuevoPlatillo.id);
            if (existente) {
                existente.cantidad += nuevoPlatillo.cantidad;
            } else {
                platillosSeleccionados.push(nuevoPlatillo);
            }
        });

        actualizarListaSeleccionados();
    });

    function actualizarListaSeleccionados() {
        let lista = document.getElementById('seleccionPlatillos');
        lista.innerHTML = ''; // Limpia la lista actual

        platillosSeleccionados.forEach(platillo => {
            let item = document.createElement('div');
            item.textContent = `${platillo.nombre} - Cantidad: ${platillo.cantidad} - ${platillo.nombre} -`;
            lista.appendChild(item);
        });
    }
    </script>


// llamaada

<script>
    document.getElementById('agregarPlatillo').addEventListener('click', function() {

        let datos = {
            platillos: platillosSeleccionados,
            _token: '{{ csrf_token() }}'
        };

        // Enviar datos con AJAX
        fetch('{{ route("agregar.pedido") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': datos._token
            },
            body: JSON.stringify(datos.platillos)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data.message);
                platillosSeleccionados = [];
                actualizarListaSeleccionados();
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });
    </script>
