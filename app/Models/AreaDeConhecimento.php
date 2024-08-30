<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaDeConhecimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'curso_id'
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function unidadesCurriculares(): HasMany
    {
        return $this->hasMany(PivotAcUc::class);
    }
}
