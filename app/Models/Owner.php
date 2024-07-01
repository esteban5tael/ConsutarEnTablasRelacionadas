<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    /* La clase Owner extiende de Model, lo que significa que es un modelo de Eloquent y puede interactuar con la base de datos. */

    use HasFactory, SoftDeletes;
    /* Se utilizan los traits HasFactory y SoftDeletes. HasFactory permite el uso de fábricas para crear instancias del modelo, mientras que SoftDeletes permite el borrado suave (soft delete), es decir, marcar un registro como eliminado sin realmente eliminarlo de la base de datos. */

    protected $fillable = [
        'id',
        'name',
    ];
    /* La propiedad protected $fillable define un arreglo de atributos que son asignables en masa. Aquí se incluyen 'id' y 'name', lo que significa que estos campos pueden ser llenados mediante asignación masiva. */

    public function identification(): HasOne
    {
        /* Se define un método público identification que devuelve una relación de tipo HasOne. */
        return $this->hasOne(Identification::class);
        /* El método hasOne establece una relación uno a uno con el modelo Identification. Esto significa que cada Owner tiene una sola Identification asociada. */
    }
}
