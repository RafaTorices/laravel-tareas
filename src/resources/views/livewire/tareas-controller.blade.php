<div>
    <h2 class="text-3xl font-bold mb-4">AÑADIR TAREAS</h2>
    <div class="mb-4 text-xl">
        <div class="mb-2">
            <input type="text" wire:model="nombre_tarea" placeholder="Escriba aquí una nueva tarea"
                class="w-full px-4 py-2 border rounded mb-2">
            @error('nombre_tarea')
                <span class="text-xs italic text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            @foreach($categorias as $categoria)
                <div>
                    <input type="checkbox" wire:model="seleccionar_categorias" value="{{ $categoria->id }}"
                        class="form-checkbox">
                    <span>{{ $categoria->nombre_categoria }}</span>
                </div>
            @endforeach
        </div>
        <div class="mb-2">
            <button wire:click="guardarTarea"
                class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">AÑADIR</button>
        </div>
        <!-- Muestra un mensaje de éxito al guardar la tarea -->
        @if (session()->has('messageExito'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('messageExito') }}</p>
            </div>
        @elseif(session()->has('messageDelete'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session('messageDelete') }}</p>
            </div>
        @endif
        <div class="mt-8">
            <h2 class="text-3xl font-bold mb-4">LISTADO DE TAREAS</h2>
            <ul>
                @foreach($tareas as $tarea)
                    <li class="border-b py-2 flex justify-between">
                        <div>
                            <strong>{{ $tarea->nombre_tarea }}</strong>
                        </div>
                        <button wire:click="borrarTarea({{ $tarea->id }})"
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Eliminar</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>