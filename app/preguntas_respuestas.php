<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Pregunta
 * @property int $ID_Respuesta
 * @property int $Numero
 * @property int $ID_Relacion_Pregunta_Cues
 * @property boolean $ES_Correcta
 * @property Pregunta $pregunta
 * @property Respuesta $respuesta
 */
class preguntas_respuestas extends Model
{

    
    public $timestamps = false;
    
    /**
     * @var array
     */
    public $incrementing = true;
    
/**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Relacion_Pregunta_Cues';

    /**
     * @var array
     */
    protected $fillable = ['ID_Pregunta', 'ID_Respuesta', 'Numero', 'ES_Correcta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta', 'ID_Pregunta', 'ID_Pregunta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function respuesta()
    {
        return $this->belongsTo('App\Respuesta', 'ID_Respuesta', 'ID_Respuesta');
    }
}
