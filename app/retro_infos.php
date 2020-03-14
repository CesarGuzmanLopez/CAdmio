<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Retro
 * @property string $RetroAlimentacion
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property User $user
 * @property Pregunta[] $preguntas
 */
class retro_infos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Retro';

    /**
     * @var array
     */
    protected $fillable = ['RetroAlimentacion', 'created_at', 'updated_at', 'ID_User'];

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
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta', 'ID_Retro_Alimentacion', 'ID_Retro');
    }
}
