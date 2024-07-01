<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identification extends Model
{
    /* La clase Identification extiende de Model, lo que significa que es un modelo de Eloquent y puede interactuar con la base de datos. */

    use HasFactory, SoftDeletes;
    /* Se utilizan los traits HasFactory y SoftDeletes. HasFactory permite el uso de fábricas para crear instancias del modelo, mientras que SoftDeletes permite el borrado suave (soft delete), es decir, marcar un registro como eliminado sin realmente eliminarlo de la base de datos. */

    protected $fillable = [
        'id',
        'owner_id',
        'type',
        'number',
    ];
    /* La propiedad protected $fillable define un arreglo de atributos que son asignables en masa. Aquí se incluyen 'id', 'owner_id', 'type' y 'number', lo que significa que estos campos pueden ser llenados mediante asignación masiva. */

    public function owner(): BelongsTo
    {
        /* Se define un método público owner que devuelve una relación de tipo BelongsTo. */
        return $this->belongsTo(Owner::class);
        /* El método belongsTo establece una relación de pertenencia con el modelo Owner. Esto significa que cada Identification pertenece a un solo Owner. */
    }
}
