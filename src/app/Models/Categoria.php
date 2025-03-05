<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre_categoria'];
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public function tarea()
    {
        return $this->belongsToMany(Tarea::class, 'tarea__categorias', 'categoria_id', 'tarea_id');
    }
}
