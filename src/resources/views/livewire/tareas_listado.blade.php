<div class="mt-8">
    <h2 class="text-3xl font-bold mb-4">LISTADO DE TAREAS</h2>
    <div class="text-xl">
        <ul>
            @if($tareas->isEmpty())
                <div class="border-b py-2 flex justify-between">
                    <div>
                        <strong>No hay tareas</strong>
                    </div>
                </div>
            @endif
            @foreach($tareas as $tarea)
                <li class="border-b py-2 flex justify-between">
                    <div>
                        <strong>{{ $tarea->nombre_tarea }}</strong>
                        <br>
                        @foreach ($tarea->categorias as $tarea_categoria)
                            <span
                                class="text-sm rounded-lg px-2 bg-white text-green-500 p-1">{{ $tarea_categoria->nombre_categoria }}</span>
                        @endforeach
                    </div>
                    <button wire:click="borrarTarea({{ $tarea->id }})"
                        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Eliminar</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>