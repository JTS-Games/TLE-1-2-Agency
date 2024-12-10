<?php

namespace App\Models;

use Database\Factories\QualificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Qualification extends Model
{
    /** @use HasFactory<QualificationFactory> */
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(Vacancy::class, 'qualification_vacancy');
    }
}
