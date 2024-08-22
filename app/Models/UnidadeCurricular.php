<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeCurricular extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration', 'area_de_conhecimento_id', 'status'];

    public function areaDeConhecimento(): BelongsTo
    {
        return $this->belongsTo(AreaDeConhecimento::class);
    }
}
