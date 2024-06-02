<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadeCurricular extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration', 'curso_id', 'status'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
}
