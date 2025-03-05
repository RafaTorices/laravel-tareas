<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea_Categoria extends Model
{
    protected $fillable = ['tarea_id', 'categoria_id'];
    protected $table = 'tarea_categorias';
    protected $primaryKey = 'id';
}
