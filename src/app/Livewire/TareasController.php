<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Tarea;
use Livewire\Component;

class TareasController extends Component
{
    public $tareas = [];
    public $nombre_tarea;
    public $categorias = [];
    public $categoriasSeleccionadas = [];
    public function render()
    {
        $this->tareas = Tarea::all();
        $this->categorias = Categoria::all();
        return view('livewire.tareas');
    }

    public function guardarTarea()
    {
        $rules = [
            'nombre_tarea' => 'required',
            'categoriasSeleccionadas' => 'required|array|min:1'
        ];
        $messages = [
            'nombre_tarea.required' => 'El campo nombre de la tarea está vacío',
            'categoriasSeleccionadas.required' => 'Debe seleccionar al menos una categoría',
            'categoriasSeleccionadas.array' => 'Debe seleccionar al menos una categoría',
            'categoriasSeleccionadas.min' => 'Debe seleccionar al menos una categoría'
        ];
        $this->validate($rules, $messages);

        $this->tarea = Tarea::create([
            'nombre_tarea' => $this->nombre_tarea
        ]);

        $this->tarea->categorias()->attach($this->categoriasSeleccionadas);
        $this->reset(['nombre_tarea', 'categoriasSeleccionadas']);
        $this->tareas = Tarea::with('categorias')->get();

        // Muestra un mensaje de éxito
        session()->flash('messageExito', 'Tarea creada con éxito');

    }

    // Metodo para eliminar una tarea
    public function borrarTarea($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        session()->flash('messageDelete', 'Tarea eliminada con éxito');
        $this->tareas = Tarea::all();
    }
}
