<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Pregunta
 * @property string $Enunciado
 * @property string $Recurso
 * @property int $ID_Tipo
 * @property int $ID_Retro_Alimentacion
 * @property int $ID_Tema
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property Tema $tema
 * @property RetroInfo $retroInfo
 * @property TipoResp $tipoResp
 * @property User $user
 * @property CuestionarioPregunta[] $cuestionarioPreguntas
 * @property PreguntasRespuesta[] $preguntasRespuestas
 */
class preguntas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Pregunta';
    public $incrementing = true;
    
    /**
     * @var array
     */
    protected $fillable = ['Enunciado', 'Recurso', 'ID_Tipo', 'ID_Retro_Alimentacion', 'ID_Tema', 'created_at', 'updated_at', 'ID_User'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema', 'ID_Tema', 'ID_Tema');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function retroInfo()
    {
        return $this->belongsTo('App\RetroInfo', 'ID_Retro_Alimentacion', 'ID_Retro');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoResp()
    {
        return $this->belongsTo('App\TipoResp', 'ID_Tipo', 'ID_TipoRespuesta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'ID_User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuestionarioPreguntas()
    {
        return $this->hasMany('App\CuestionarioPregunta', 'ID_Pregunta', 'ID_Pregunta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntasRespuestas()
    {
        return $this->hasMany('App\PreguntasRespuesta', 'ID_Pregunta', 'ID_Pregunta');
    }
}
