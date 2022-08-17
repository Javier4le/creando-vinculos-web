<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JuntaVecinos
 *
 * @property $id
 * @property $unidad_vecinal
 * @property $direccion
 * @property $sector
 * @property $representante
 * @property $email
 * @property $horario
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JuntaVecinos extends Model
{

    static $rules = [
		'unidad_vecinal' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['unidad_vecinal','direccion','sector','representante','email','horario'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'juntas_vecinos';

}
