<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Dispositiva
 * @property int $ID_Presentacion
 * @property string $Nombre
 * @property string $updated_at
 * @property string $created_at
 * @property string $Texto
 * @property int $ID_Pregunta
 * @property int $Numero_De_diapositiva
 * @property Pregunta $pregunta
 * @property Presentacione $presentacione
 */
class diapositivas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Dispositiva';

    /**
     * @var array
     */
    protected $fillable = ['ID_Presentacion', 'Nombre', 'updated_at', 'created_at', 'Texto', 'ID_Pregunta', 'Numero_De_diapositiva'];

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
    public function presentacione()
    {
        return $this->belongsTo('App\Presentacione', 'ID_Presentacion', 'ID_Presentacion');
    }
}
