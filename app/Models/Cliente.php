<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   // use HasFactory;
   protected $table="pago";
   protected $primarykey="id";
   protected $fillable = [
         'numero_tarjeta', 'nombre', 'telefono', 'provincia', 'municipio', 'direccion', 'codigo_postal', 'expiracion'
   ];

}
