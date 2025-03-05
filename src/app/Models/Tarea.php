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
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

}
