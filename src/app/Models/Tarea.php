<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_tarea'];
    protected $table = 'tareas';
    protected $primaryKey = 'id';
    // Relación uno a muchos con la tabla de categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'tarea__categorias', 'tarea_id', 'categoria_id');
    }

}
