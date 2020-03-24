<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Presentacion
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $created_at
 * @property string $updated_at
 * @property Dispositiva[] $dispositivas
 */
class presentaciones extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Presentacion';
    public $incrementing = true;
    
    /**
     * @var array
     */
    protected $fillable = ['Nombre', 'Descripcion', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispositivas()
    {
        return $this->hasMany('App\Dispositiva', 'ID_Presentacion', 'ID_Presentacion');
    }
}
