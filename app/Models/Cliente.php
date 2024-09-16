<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
      'nombre',
      'credito',
      'deuda',
      'estado',
      'vigencia',
   ];

    public function todo()
    {
        return DB::table($this->table)->get();
    }

    public function buscar($id)
    {
        return DB::table($this->table)->find($id);
    }

    public function crear($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function actualizar($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function borrar($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }

    public function getVigenciaPredeterminado($val)
    {
        return $val ?? 'A';
    }
}