<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $credito
 * @property $deuda
 * @property $estado
 * @property $vigencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Deuda[] $deudas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'credito' => 'required',
		'deuda' => 'required',
		'estado' => 'required',
		'vigencia' => 'required',
    ];

    protected $perPage = 25;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','credito','deuda','estado','vigencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //public function deudas()
    //{
    //    return $this->hasMany('App\Models\Deuda', 'cliente_id', 'id');
    //}
    

}
