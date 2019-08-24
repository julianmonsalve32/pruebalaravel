<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     //nombre de la tabla del modelo
	protected $table = 'persona';
	//llave primaria de la tabla
	protected $primaryKey = 'id';
	//datos que pueden ser editados en las consultas
    protected $fillable = ['nombres','apellidos','cedula','email','telefono'];
}
