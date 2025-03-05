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
        //Mostramos las tareas y categorias
        $this->tareas = Tarea::with('categorias')->get();
        $this->categorias = Categoria::all();
        return view('livewire.tareas');
    }

    // Metodo para guardar una tarea
    public function guardarTarea()
    {
        //Reglas de validación
        $rules = [
            'nombre_tarea' => 'required',
            'categoriasSeleccionadas' => 'required|array|min:1'
        ];
        //Mensajes de validación
        $messages = [
            'nombre_tarea.required' => 'El campo nombre de la tarea está vacío',
            'categoriasSeleccionadas.required' => 'Debe seleccionar al menos una categoría',
            'categoriasSeleccionadas.array' => 'Debe seleccionar al menos una categoría',
            'categoriasSeleccionadas.min' => 'Debe seleccionar al menos una categoría'
        ];
        //Validamos los campos
        $this->validate($rules, $messages);

        //Guardamos la tarea
        $this->tarea = Tarea::create([
            'nombre_tarea' => $this->nombre_tarea
        ]);
        //Adjuntamos a la tarea las categorias seleccionadas
        $this->tarea->categorias()->attach($this->categoriasSeleccionadas);
        $this->reset(['nombre_tarea', 'categoriasSeleccionadas']);
        // Muestra un mensaje de éxito
        session()->flash('messageExito', 'Tarea creada con éxito');
    }

    // Metodo para eliminar una tarea
    public function borrarTarea($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        // Muestra un mensaje de éxito
        session()->flash('messageDelete', 'Tarea eliminada con éxito');
    }
}
