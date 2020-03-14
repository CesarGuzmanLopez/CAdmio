<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Respuesta
 * @property string $Respuesta
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property User $user
 * @property PreguntasRespuesta[] $preguntasRespuestas
 */
class respuestas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Respuesta';

    /**
     * @var array
     */
    protected $fillable = ['Respuesta', 'created_at', 'updated_at', 'ID_User'];

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
    public function preguntasRespuestas()
    {
        return $this->hasMany('App\PreguntasRespuesta', 'ID_Respuesta', 'ID_Respuesta');
    }
}
