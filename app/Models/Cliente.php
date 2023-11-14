<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'credito',
        'deuda',
        'estado',
        'vigencia',
    ];

    public function getVigenciaPredeterminado($val)
    {
        return $val ?? 'A';
    }

    //public function deudas()
    //{
    //    return $this->hasMany('App\Models\Deuda', 'cliente_id', 'id');
    //}
}
