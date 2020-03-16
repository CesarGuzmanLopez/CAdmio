<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Cuestionario
 * @property string $NombreCuestionario
 * @property string $created_at
 * @property string $updated_at
 * @property int $ID_User
 * @property User $user
 * @property CuestionarioPregunta[] $cuestionarioPreguntas
 */
class Cuestionarios extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Cuestionario';
    public $incrementing = true;
    
    /**
     * @var array
     */
    protected $fillable = ['NombreCuestionario', 'created_at', 'updated_at', 'ID_User'];

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
        return $this->hasMany('App\CuestionarioPregunta', 'ID_Cuestionario', 'ID_Cuestionario');
    }
}
