<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_TipoRespuesta
 * @property string $Tipo
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property Pregunta[] $preguntas
 */
class tipo_resps extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_TipoRespuesta';
    public $incrementing = true;
    /**
     * @var array
     */
    protected $fillable = ['Tipo', 'created_at', 'updated_at', 'ID_User'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta', 'ID_Tipo', 'ID_TipoRespuesta');
    }
}
