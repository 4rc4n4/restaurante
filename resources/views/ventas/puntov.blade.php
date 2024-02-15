<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/puntov.css') }}">
    <input type="hidden" id="id_venta" />
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
                        <div class="flex-row mesa-form">
                            <label for="mesa" class="mesa-label">Mesa:</label>
                            <input type="number" id="mesa" name="mesa" placeholder="No. mesa" class="mesa-input" min="1" step="1" required/>
                            <input type="hidden" name="mesero" value="{{ $usuario->id }}" />
                            <input type="hidden" name="sucursal_id" value="{{ $sucursal->id }}" />
                            <button type="submit" class="cuenta-button">Abrir cuenta</button>
                        </div>

                    </form>
                    <hr>

                    <div class="scroll">
                        @forelse($ventas as $venta)
                            <button class="card"  onclick="showdetail({{ $venta->id }})">
                                <br>
                                <p>Mesa: {{ $venta->mesa }}</p>
                                <p id='total-venta-{{ $venta->id }}'>Total: $0.00</p>
                            </button>
                            &nbsp;
                            &nbsp;
                        @empty
                            <p>No hay ventas pendientes.</p>
                        @endforelse
                    </div>


                    <div class="container" style="display: none" id="detalleVenta">

                        <div class="container">
                            <table id="cuenta">
                                <thead>
                                    <tr>
                                        <th>Platillo</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="platillos-detalle">

                                </tbody>
                            </table>
                            </table>
                        </div>
                        <label for="cantidad"> Cantidad:</label>
                        <input type="numeric" id=cantidad placeholder="cantidad de platillos"/>
                        <br>
                        <label for="platillos">Selecciona los platillos:</label>
                            <div class="scroll">
                            @forelse($platillos as $platillo)
                                <button class="alimento"  onclick="addplatillo({{ $venta->id}},{{$platillo->id}},{{$platillo->costo}})">
                                    <br>
                                    <p>{{ $platillo->nombre }}</p>
                                    <p>${{ number_format($platillo->precio_venta,2) }}</p>
                                </button>
                                &nbsp;
                                &nbsp;
                            @empty
                                <p>No hay ventas pendientes.</p>
                            @endforelse
                        </div>
                    </div>


            </div>
        </div>
    </div>

</x-app-layout>

<script>



    function showdetail(id) {
    // Mostrar el contenedor de los detalles de la venta
        document.getElementById('detalleVenta').style.display = 'block';
        document.getElementById('id_venta').value = id;
        // Preparar los datos para enviar
        let datos = {
            idventa: id,
            _token: '{{ csrf_token() }}'
        };
        fetch('{{ route("detalle.pedido") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': datos._token
                },
                body: JSON.stringify(datos)
        })

        .then(response => response.json())
        .then(data => {
                if (data.success) {
                    let ventaId = id;
                    let totalVenta = data.total;
                    let elementoId = 'total-venta-' + ventaId;
                    document.getElementById(elementoId).innerHTML = 'Total: $' + totalVenta.toFixed(2);
                    // Limpia la tabla antes de pintar de nuevo
                    let tabla = document.getElementById('platillos-detalle');
                    tabla.innerHTML = ''; // Esto borra el contenido actual de la tabla
                    let tempcomanda = data.comanda;
                    let cont = 0;
                    document.getElementById('platillos-detalle').innerHTML="";
                    while(cont<(tempcomanda.length)){
                        let tabla = document.getElementById('platillos-detalle');
                        let nuevaFila = tabla.insertRow(-1);
                        console.log(tempcomanda[cont]);
                        nuevaFila.insertCell().innerHTML = tempcomanda[cont].nombre;
                        nuevaFila.insertCell().innerHTML = tempcomanda[cont].cantidad;
                        nuevaFila.insertCell().innerHTML = '$' + tempcomanda[cont].costo; tempcomanda[cont].id
                        nuevaFila.insertCell().innerHTML = '<button class="btn btn-danger" onclick="eliminarp(' + (tempcomanda[cont].id) + ')">Eliminar</button>';
                        cont++;
                    }
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

function eliminarp(id) {
    let datos = {
            idventa: id,
            _token: '{{ csrf_token() }}'
        };
        fetch('{{ route("detalle.destroy") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': datos._token
                },
                body: JSON.stringify(datos)
        })
    .then(response => response.json())
    .then(data => {
            location.reload();
        })
    .catch(error => console.error('Error:', error));

}


function addplatillo(id,platillo_id,costo) {
    //alert('agregarplatillo a la venta '+ document.getElementById('id_venta').value);
    let datos = {
            idventa: document.getElementById('id_venta').value,
            _token: '{{ csrf_token() }}',
            cantidad: document.getElementById('cantidad').value,
            platillos_id: platillo_id,
            costo: costo
        };
        fetch('{{ route("detalle.actualventa") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': datos._token
                },
                body: JSON.stringify(datos)
        })
    .then(response => response.json())
    .then(data => {
            location.reload();
        })
    .catch(error => console.error('Error:', error));

}


    </script>
