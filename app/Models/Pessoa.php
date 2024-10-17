<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'genero',
    ];

    protected $dates = ['deleted_at'];

    public function estudante(): HasMany
    {
        return $this->hasMany(Estudante::class, 'pessoa_id');
    }
}
