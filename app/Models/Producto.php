<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }

    //se activa la opcion de assignacion masiva para que deje crear registros
    

    protected $guarded = [];
}
