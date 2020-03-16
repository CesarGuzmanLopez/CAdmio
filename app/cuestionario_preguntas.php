<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Cuestionario
 * @property int $ID_Pregunta
 * @property float $Porcentaje
 * @property string $Recurso
 * @property int $ID_NumPegunta
 * @property Cuestionario $cuestionario
 * @property Pregunta $pregunta
 */
class cuestionario_preguntas extends Model
{
    /**
     * @var array
     */
    public $timestamps = false;
    
    protected $fillable = ['Porcentaje', 'Recurso'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cuestionario()
    {
        return $this->belongsTo('App\Cuestionario', 'ID_Cuestionario', 'ID_Cuestionario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta', 'ID_Pregunta', 'ID_Pregunta');
    }
}
