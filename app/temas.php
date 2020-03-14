<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Tema
 * @property int $ID_Tema_Prin
 * @property string $Nombre_Tema
 * @property string $Descripcion
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property Tema $tema
 * @property Pregunta[] $preguntas
 */
class temas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Tema';

    /**
     * @var array
     */
    protected $fillable = ['ID_Tema_Prin', 'Nombre_Tema', 'Descripcion', 'created_at', 'updated_at', 'ID_User'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tema()
    {
        return $this->belongsTo('App\Tema', 'ID_Tema_Prin', 'ID_Tema');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta', 'ID_Tema', 'ID_Tema');
    }
}
