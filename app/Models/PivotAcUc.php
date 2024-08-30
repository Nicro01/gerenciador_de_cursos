<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotAcUc extends Model
{
    use HasFactory;

    protected $fillable = ['unidade_curricular_id', 'area_de_conhecimento_id'];

    public function unidadeCurricular()
    {
        return $this->belongsTo(UnidadeCurricular::class);
    }

    public function areaDeConhecimento()
    {
        return $this->belongsTo(AreaDeConhecimento::class);
    }
}
