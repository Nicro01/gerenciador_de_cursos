<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'duration', 'status'];

    public function areasDeConhecimento(): HasMany
    {
        return $this->hasMany(AreaDeConhecimento::class);
    }
}
