<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClubDeportivo
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $sector
 * @property $email
 * @property $actividad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ClubDeportivo extends Model
{

    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','sector','encargado','email','estado'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clubes_deportivos';

}
